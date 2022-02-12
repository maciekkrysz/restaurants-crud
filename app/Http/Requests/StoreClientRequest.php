<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'first_name' => 'required|max:30|min:2',
            'last_name' => 'required|max:30|min:2',
            'postal_code' => array(
                'required',
                'regex:/\d{2}-\d{3}/'
            ),
            'city' => 'required|max:30|min:2',
            'address1' => 'required|max:60|min:2',
            'address2' => 'max:60|min:2',
        ];
    }
}
