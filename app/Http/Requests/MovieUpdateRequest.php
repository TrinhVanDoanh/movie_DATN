<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieUpdateRequest extends FormRequest
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
        // Lấy id của phim để tránh việc kiểm tra duy nhất với chính bản thân của nó
        $movieId = $this->route('movie')->id;

        return [
            'name'=> 'required|unique:movies,name,' . $movieId,
            'director_id'=> 'required',
            'release_date'=> 'required',
            'time'=> 'required',
            'trailer'=> 'required',
            'location'=> 'required',
            'describe'=> 'required',
            'status'=> 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên phim',
            'director_id'=> 'Đạo diễn',
            'release_date'=> 'Ngày công chiếu',
            'time'=> 'Thời lượng',
            'trailer'=> 'Trailer phim',
            'location'=> 'Quốc gia',
            'describe'=> 'Nội dung phim',
            'status'=> 'Trạng thái',
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
