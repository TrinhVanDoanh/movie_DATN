<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerUpdateRequest extends FormRequest
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
            'link'=>'required|unique:Banners',
        ];
    }
    public function attributes(): array
    {
        return [
            'link' => 'Đường link banner',
        ];
    }
    public function messages()
    {
        return[
            'required'=>':attribute không được để trống',
            'unique'=>':attribute không được trùng nhau ',
        ];
    }
}
