<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveContactRequest extends FormRequest
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
            'contact' => 'required',
            'contact.first_name' => 'required|max:20',
            'contact.last_name' => 'required|max:20',
            'contact.phone_number' => 'required',
            'contact.house_phone_number' => 'nullable',
            'contact.email' => 'nullable|email|max:255',
            'contact.address' => 'nullable|max:100',
            'contact.birthday' => 'nullable|date',
            'contact.memo' => 'nullable',
            'contact.gender' => 'required|numeric'
        ];
    }
}
