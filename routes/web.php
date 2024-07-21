<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PerformerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\PerformerMovieController;
use App\Http\Controllers\Admin\CategoryMovieController;
use App\Http\Controllers\Admin\MovieScheduleController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\AccountInforController;
use App\Http\Controllers\HomeController;
use  App\Http\Controllers\MovieInformationController;
use  App\Http\Controllers\PerformerInformationController;
use  App\Http\Controllers\DirectorInformationController;
use  App\Http\Controllers\BookTicketMovieInformationController;
use  App\Http\Controllers\BookingInformationController;
use  App\Http\Controllers\CategoryMovieClientController;
use  App\Http\Controllers\Account\RegisterController;
use  App\Http\Controllers\Account\LoginController;
use  App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\VNPayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/mua-ve',[HomeController::class,'buyTicket'])->name('home.buyTicket');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/phim-dang-chieu', [HomeController::class, 'movieShowing'])->name('movieShowing');
Route::get('/phim-sap-chieu', [HomeController::class, 'movieComingSoon'])->name('movieComingSoon');
Route::get('/the-loai/{id}', [CategoryMovieClientController::class, 'movieSameCategory'])->name('movieSameCategory');

Route::group(['middleware' => ['role:admin']], function() {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('director', DirectorController::class);
        Route::resource('performer', PerformerController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('room', RoomController::class);
        Route::resource('movie', MovieController::class);
        Route::resource('performer_movie', PerformerMovieController::class);
        Route::resource('category_movie', CategoryMovieController::class);
        Route::resource('movie_schedule', MovieScheduleController::class);
        Route::resource('account', AccountInforController::class);
        Route::resource('ticket', TicketController::class);
        Route::put('tickets/{id}/update-status', [TicketController::class, 'updateStatus'])
        ->name('tickets.update.status');
    });
});



Route::get('/dat-ve/{id}', [BookTicketMovieInformationController::class, 'getMovieBookTicket'])->name('get-movieBookTicket');
Route::get('/movie/{id}', [MovieInformationController::class, 'getMovie'])->name('get-movie');
Route::get('/performer/{id}', [PerformerInformationController::class, 'getPerformer'])->name('get-performer');
Route::get('/director/{id}', [DirectorInformationController::class, 'getDirector'])->name('get-director');
Route::get('/booking/{id}', [BookingInformationController::class, 'selectSeat'])->name('select-seat');
Route::get('/change-schedule', [BookingInformationController::class, 'changeSchedule']);
Route::post('/checkout', [BookingInformationController::class, 'payment'])->name('checkout');

// Thanh toán online
Route::post('/payment', [VNPayController::class, 'createPayment'])->name('payment.create');
Route::get('/vnpay-return', [VNPayController::class, 'vnpayReturn'])->name('vnpay.return');
// Đămg ký
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/checkDuplicate', [RegisterController::class, 'checkDuplicate'])->name('checkDuplicate');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/statusLogin', [LoginController::class, 'statusLogin']);
Route::get('/tai-khoan', [AccountController::class, 'inforAccount'])->name('tai-khoan');
Route::get('/get-changePassword', [AccountController::class, 'getchangePassword'])->name('getChangePassword');
Route::post('/changePassword', [AccountController::class, 'changePassword'])->name('changePassword');
Route::get('/forgot-password', [AccountController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgot-password', [AccountController::class, 'sendMailResetPassword'])->name('sendMailResetPassword');
Route::get('/get-password/{token}', [AccountController::class, 'getPassword'])->name('getPassword');
Route::post('/get-password/{token}', [AccountController::class, 'postGetPassword'])->name('postGetPassword');
// Lịch sửa đặt vé
Route::get('/lich-su-giao-dịch', [AccountController::class, 'bookingHistory'])->name('lich-su-giao-dịch');




// Auth::routes();
