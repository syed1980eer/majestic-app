<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
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
            'item_unq_id' => ['required'],
            'product_id' => ['required'],
            'item_name' => ['required'],
            'item_no' => ['required'],
            'item_description' =>  ['max:600'],
            'item_unit_measure' => ['required'],
            'item_image' => ['required'],
        ];
    }
}
