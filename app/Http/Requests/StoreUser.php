<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'unique:users|max:255|email|required',
            'password' => 'required|max:255|min:6',
            'address' => 'required|max:255',
            'postalcode' => 'required|max:5',
            'city' => 'required|max:255',
        ];
    }
}
