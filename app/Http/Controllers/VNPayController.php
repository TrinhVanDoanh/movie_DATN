<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Ticket;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VNPayController extends Controller
{
    public function createPayment(Request $request)
    {
        $vnp_TmnCode = "22R940XD"; // Mã website tại VNPAY
        $vnp_HashSecret = "GNZS96M2XDRIEI6YSVOL3NGNWCZKURWX"; // Chuỗi bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8080/vnpay-return";

        // Tạo bill trước khi chuyển tới VNPay
        $dateOrder = Carbon::createFromFormat('d/m/Y', $request->date_order)->format('Y-m-d');
        $bill = Bill::create([
            'user_id' => $request->user_id,
            'date_order' => $dateOrder,
            'total_price' => $request->total_price,
            'status' => 0
        ]);

        $vnp_TxnRef = $bill->id;
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->total_price * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" =>  date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;

        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $request->session()->put('payment_info.movie_schedule_id', $request->movie_schedule_id);
        $request->session()->put('payment_info.selected_seats', $request->selected_seats);

       return redirect($vnp_Url);
    }


    public function vnpayReturn(Request $request)
    {
        $vnp_HashSecret = 'GNZS96M2XDRIEI6YSVOL3NGNWCZKURWX';
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $transactionStatus = $inputData['vnp_ResponseCode'];

        if ($secureHash == $request->vnp_SecureHash) {
            if ($transactionStatus == '00') {
                try {
                    $bill = Bill::findOrFail($inputData['vnp_TxnRef']);
                    $bill->status = 1;
                    $bill->save();

                    $movieScheduleId = session()->get('payment_info.movie_schedule_id');
                    $selectedSeats = session()->get('payment_info.selected_seats');

                    session()->forget('payment_info');
                    // Tạo vé cho từng ghế đã chọn
                    foreach (explode(',', $selectedSeats) as $seat) {
                        $seat = trim($seat);
                        Ticket::create([
                            'movie_schedule_id' => $movieScheduleId,
                            'bill_id' => $bill->id,
                            'seat_code' => $seat,
                            'status' => 1,
                        ]);
                    }

                    return view('vn_pay.thanhcong');
                } catch (\Exception $e) {
                    Log::error('Lỗi khi xử lý thanh toán: ' . $e->getMessage());
                    return view('vn_pay.thatbai');
                }
            } else {
                try {
                    $bill = Bill::findOrFail($inputData['vnp_TxnRef']);
                    if ($bill->status == 0) { // Chỉ xóa nếu chưa được xử lý trước đó
                        $bill->delete();
                    }
                } catch (\Exception $e) {
                    Log::error('Lỗi khi xóa hóa đơn: ' . $e->getMessage());
                }
                return view('vn_pay.thatbai');
            }
        } else {
            Log::error('Sai chữ ký');
            return response()->json(['message' => 'Sai chữ ký'], 400);
        }
    }

}
