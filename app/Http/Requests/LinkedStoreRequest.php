<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkedStoreRequest extends FormRequest
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
            'linked_unq_id' => ['required'],
            'customer_id' => ['required'],
            'product_id' => ['required'],
            'item_id' => ['required'],
            'supplier_ref_no' => ['required'],
            'supplier_barcode' =>  ['max:600'],
            'item_image' => ['required'],
            'item_cost' => ['required'],
        ];
    }
}
