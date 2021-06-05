<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('Admin_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => [
                'string',
                'required',
            ],
            'email'   => [
                'required',
                'unique:users,email',
            ],
            'job_title'   => [
                'required',
                'string',
            ],
            'password'    => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
            'userType'    => [
                'required',
                'in:user,admin'
            ],

        ];
    }
}
