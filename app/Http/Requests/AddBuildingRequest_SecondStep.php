<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class AddBuildingRequest_SecondStep extends FormRequest
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
            'floor_name.*'    => [
                'string',
                'required',
            ],
            'floor_number.*'    => [
                'required',
                'string',
            ],
            'floor_location.*'    => [
                'required',
                'string',
            ],
            'room_number.*'    => [
                'required',
                'integer',
                'min:0',
                'max:20',
            ],
           
        ];
    }
}
