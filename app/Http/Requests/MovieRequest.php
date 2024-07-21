<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'name'=> 'required|unique:movies',
            'director_id'=> 'required',
            'release_date'=> 'required',
            'time'=> 'required',
            'location'=> 'required',
            'trailer'=> 'required',
            'describe'=> 'required',
            'status'=> 'required',
            'file_upload'=> 'required',
            'file_upload_banner'=> 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên phim',
            'director_id'=> 'Đạo diễn',
            'release_date'=> 'Ngày công chiếu',
            'time'=> 'Thời lượng',
            'location'=> 'Quốc gia',
            'trailer'=> 'Trailer phim',
            'describe'=> 'Nội dung phim',
            'status'=> 'Trạng thái',
            'file_upload'=> 'Ảnh phim',
            'file_upload_banner'=> 'Ảnh banner của phim',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'unique'=>':attribute không được trùng nhau'
        ];
    }
}
