<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO change this when auth will be completed.
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
            'billing_address' => 'required|max:255',
            'billing_postalcode' => 'required|max:5',
            'billing_city' => 'required|max:255',
            'delivery_address' => 'required|max:255',
            'delivery_postalcode' => 'required|max:5',
            'delivery_city' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
            'books' => 'required|exists:books,id',
        ];
    }
}
