<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:rooms',
            'numberofseats' => 'required|integer',
            'status' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên phòng',
            'numberofseats' => 'Số lượng ghế',
            'status' => 'Trạng thái phòng',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attribute không được để trống',
            'name.unique'=>":attribute không được trùng nhau",
            'numberofseats.required' => ':attribute không được để trống',
            'numberofseats.integer' => ':attribute phải là số',
            'status.required' => ':attribute không được để trống',
        ];
    }
}
