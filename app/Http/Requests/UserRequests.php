<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequests extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required',
            'email'=> 'required',

            // 'status_id'=>'required|exists:statuses,id',
            // 'group_id'=>'required_if:request_type,=,4|exists:groups,id',
            // 'bag_id'=>'required_if:request_type,=,1',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'required'=>t('This field is required'),
            'required_if'=>t('This field is required'),
            'exists'=>t('Wrong value'),
            'integer'=>t('Wrong value'),
        ];
    }
}
