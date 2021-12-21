<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateForumRequest extends FormRequest
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
            'desc'                  => 'required|min:20|max:1000',
            'image'                 => 'mimes:jpeg,jpg,png,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'image.mimes'              => '[Gambar hanya mendukung format : jpeg, jpg, png, gif]',
            'image.max'                => '[Ukuran maksimal 2mb]',
            'desc.required'            => '[Postingan wajib diisi]',
            'desc.min'                 => '[Minimal 20 karakter]',
            'desc.max'                 => '[Maximal 1000 karakter]',
        ];
    }
}
