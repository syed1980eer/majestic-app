<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'order_unq_id' => ['required', 'max:255'],
            'customerName_input2' => ['required', 'max:255'],
            'linked_id' => ['required', 'max:255'],
            'product_name_input' => ['required', 'max:255'],
            'item_name_input' => ['required', 'max:255'],
            'item_no_input' => ['required', 'max:255'],
            'item_description_input' => ['required', 'max:255'],
            'supplier_ref_no_input' => ['required', 'max:255'],
            'supplier_barcode_input' => ['required', 'max:255'],
            'item_cost_input' => ['required', 'max:255'],
            'item_quantity' => ['required', 'max:255'],
            'itemTotal_input' => ['required', 'max:255'],
            'subtotal_input' => ['required', 'max:255'],
            'tax_input' => ['required', 'max:255'],
            'total_input' => ['required', 'max:255'],
        ];
    }
}
