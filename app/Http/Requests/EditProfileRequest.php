<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required|min:3|max:500',
            'profile'                 => 'mimes:jpeg,jpg,png,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'profile.mimes'              => '[Gambar hanya mendukung format : jpeg, jpg, png, gif]',
            'profile.max'                => '[Ukuran gambar maksimal 2mb]',
            'name.required'            => '[Nama wajib diisi]',
            'name.min'                 => '[Minimal 10 karakter]',
            'name.max'                 => '[Maximal 1000 karakter]',
        ];
    }
}
