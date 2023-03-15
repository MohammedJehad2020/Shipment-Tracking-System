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
            'role_id'=> 'required_if:id,=,null',
            'status'=> 'required_if:id,=,null',
            'description'=> 'required_with:id',
            'language'=> 'required_with:id',
            'street'=> 'required_with:id',
            'country_code'=> 'required_with:id',
            'state'=> 'required_with:id',
            'city'=> 'required_with:id',
            'post_code'=> 'required_with:id',
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
            'required_with'=>t('This field is required'),
            'exists'=>t('Wrong value'),
            'integer'=>t('Wrong value'),
        ];
    }
}
