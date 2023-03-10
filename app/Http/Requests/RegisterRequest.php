<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'name' => 'required|string',
         'gender' => 'required|in:F,M',
         'email' => 'required|string|email|max:255|unique:users,email',
         'password' => 'required|string|max:255|min:8',
         'address' => 'required|string',
         'phone_number' => 'required|max:12',
         'profile_picture' => 'required|image'
      ];
   }
}
