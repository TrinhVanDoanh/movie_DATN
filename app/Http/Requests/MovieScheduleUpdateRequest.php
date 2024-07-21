<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Http\FormRequest;

class MovieScheduleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'room_id' => 'required',
        'movie_id' => 'required',
        'start_time' => 'required|date_format:d/m/Y H:i',
            'end_time' => 'required|date_format:d/m/Y H:i|after:start_time',
        'price_ticket' => 'required|numeric|min:0',
        'status' => 'required|boolean',
    ];
}

    public function attributes(): array
    {
        return [
            'room_id' => 'Tên phòng',
            'movie_id' => 'Tên phim',
            'start_time' => 'Thời gian bắt đầu',
            'end_time' => 'Thời gian kết thúc',
            'price_ticket' => 'Giá vé',
            'status' => 'Trạng thái',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'exists' => ':attribute không tồn tại',
            'after' => ':attribute phải sau thời gian bắt đầu',
            'numeric' => ':attribute phải là số',
            'min' => ':attribute không được nhỏ hơn 0',
            'boolean' => ':attribute phải là giá trị đúng hoặc sai',
        ];
    }
}
