<?php

namespace Jde\Http\Requests;

use Jde\Http\Requests\Request;

class RegistrationRequest extends Request
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
            'first_name'     => 'required|min:2',
            'last_name'      => 'required|min:2',
            'email'          => 'required|email|unique:users,email|max:255',
            'mobile'         => 'required|min:10',
            'firm'           => 'required',
            'sector'         => 'required',
            'question_one'   => 'required',
            'question_two'   => 'required',
            'question_three' => 'required',
            'question_three' => 'required',
            'favorite_slot'  => 'required'
        ];
    }
}
