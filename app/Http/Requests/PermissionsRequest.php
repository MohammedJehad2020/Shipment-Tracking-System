<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required_without:id|unique:permissions,name',
            'updateName'=> 'required_with:id|unique:permissions,name,'.$this->id,
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
            'unique'=>t('The name has already been taken.'),

        ];
    }
}
