<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

use function Laravel\Prompts\password;

class StoreUserRequest extends FormRequest
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
            'name'=>['required','string','min:3'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','string','min:6']
        ];
    }
    // public function errors(): array
    // {
    //     return [
    //         'name.required' => 'Name is required.',
    //         'name.string' => 'Name must be a string.',
    //         'name.min' => 'Name must be at least :min characters long.',
    //         'email.required' => 'Email is required.',
    //         'email.email' => 'Please enter a valid email address.',
    //         'email.unique' => 'This email address is already in use.',
    //         'password.required' => 'Password is required.',
    //         'password.min' => 'Password must be at least :min characters long.',
    //         'password.string' => 'Password must be a string.',
    //     ];
    // }
}
