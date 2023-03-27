<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GoodsRequest extends FormRequest
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
            'description'=> 'required',
            'price_from_city_to_city'=> 'required',
            'price_inside_city'=> 'required',
            'price_from_country_to_country'=> 'required',
            'status'=> 'required',
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
