<?php

// namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;

// class RegisterRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      */
//     public function authorize(): bool
//     {
//         return true;
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
//      */
//     public function rules(): array
//     {
//         return [
//             'name'=>'required|min:3|unique:users',
//             'username'=>'required|string|min:3|unique:users',
//             'email'=>'required|email|unique:users',
//             'caisse'=>'required|string|min:3|unique:users',
//             'fonction'=>'required|string|min:3',
//             'password'=>'required|min:1'
//         ];
//     }
// }
