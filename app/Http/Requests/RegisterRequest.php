<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'min:4', 'max:125'],
            'email' => ['required', 'email', 'unique:users', 'min:2', 'max:125'],
            'password' => ['required', 'min:4', 'max:125', 'confirmed'],
            'password_confirmation' => ['required', 'min:4', 'max:125'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Kullanıcı adı alanı zorunludur',
            'name.min' => 'Kullanıcı adı en az 4 karakterden oluşmalıdır',
            'name.max' => 'Kullanıcı adı en fazla 125 karakterden oluşmalıdır',
        ];
    }
}

