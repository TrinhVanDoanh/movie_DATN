<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectorRequest extends FormRequest
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
            'name'=> 'required',
            'height'=>'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên đạo diễn',
        ];
    }
    public function messages()
    {
        return[
            'required'=>':attribute không được để trống',
            'numeric'=>'Dữ liệu phải là số'
        ];
    }
}
