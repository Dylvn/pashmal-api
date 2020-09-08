<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook extends FormRequest
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
            'name' => 'required|unique:books|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'available' => 'required|boolean',
            'created_at' => 'required|date_format:Y-m-d',
            'genres' => 'required|exists:genres,id',
        ];
    }
}
