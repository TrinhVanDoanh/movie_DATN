<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id|not_in:0',
            'movie_id' => 'required|exists:movies,id|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Vui lòng chọn thể loại.',
            'category_id.exists' => 'Thể loại không hợp lệ.',
            'category_id.not_in' => 'Vui lòng chọn thể loại hợp lệ.',
            'movie_id.required' => 'Vui lòng chọn phim.',
            'movie_id.exists' => 'Phim không hợp lệ.',
            'movie_id.not_in' => 'Vui lòng chọn phim hợp lệ.',
        ];
    }
}
