<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sender_name'=> 'required',
            'sender_phone'=> 'required',
            'sender_address'=> 'required',
            'sender_location'=> 'required',
            'recipient_name'=> 'required',
            'recipient_phone'=> 'required',
            'recipient_address'=> 'required',
            'recipient_location'=> 'required',
            'status'=> 'required',
            'shipment_type'=> 'required',

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
