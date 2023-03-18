<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validations  = null;
        $column = null;
        if ($this->isMethod('post')) {
            $column = 'name';
            $validations = 'required|unique:permissions,name,';
        }else if($this->isMethod('put')){
            $column = 'updateName';
            $validations = 'required|unique:permissions,name,'.$this->id;
        }
        return [
            $column => $validations,
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
            'required_without'=>t('This field is required'),
            'exists'=>t('Wrong value'),
            'integer'=>t('Wrong value'),
            'unique'=>t('The name has already been taken.'),

        ];
    }
}
