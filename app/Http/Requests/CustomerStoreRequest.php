<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'customer_unq_id'     => ['required', 'max:255'],
            'customer_name'       => ['required', 'max:255'],
            'contact_person_name' => ['max:255'],
            'contact_person_no'   => ['max:255'],
        ];
    }
}
