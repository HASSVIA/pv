<?php

namespace PuntoVenta\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInsertRequest extends FormRequest
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
            'user_name' => 'required|max:150',
            'user_login' => 'required|max:20|unique:user',
            'user_password' => 'required',
            'user_mail' => 'required|max:100'
        ];
    }
}
