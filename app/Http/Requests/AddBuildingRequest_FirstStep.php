<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class AddBuildingRequest_FirstStep extends FormRequest
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
            'building_name'    => [
                'string',
                'required',
            ],
            'building_number'    => [
                'required',
                'string',
            ],
            'building_location'    => [
                'required',
                'string',
            ],
            'floor_number'    => [
                'required',
                'integer',
                'min:1',
                'max:20',
            ],
        ];
    }
}
