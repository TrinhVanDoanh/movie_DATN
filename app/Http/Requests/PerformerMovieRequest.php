<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerformerMovieRequest extends FormRequest
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
            'performer_id' => 'required|exists:performers,id|not_in:0',
            'movie_id' => 'required|exists:movies,id|not_in:0',
        ];
    }

    /**
     * Get custom attribute names.
     */
    public function attributes(): array
    {
        return [
            'performer_id' => 'Diễn viên',
            'movie_id' => 'Phim',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'exists' => ':attribute không hợp lệ',
            'not_in' => 'Vui lòng chọn :attribute hợp lệ',
        ];
    }
}
