<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name'=>'required|string|max:225',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg,gif',
            'price'=>'required|string',
            'stock'=>'required',
            'category_id'=>'required'
        ];
    }

    public function message(): array
    {
        return [
            'product_name.required'=>'Pls Fill Out This Field',
            'description.required'=>'Pls Fill Out This Field',
            'image.mimes'=>'Extension Gambar Tidak Diperbolehkan',
            'price.required'=>'Pls Fill Out This Field',
            'stock.required'=>'Pls Fill Out This Field',
            'category_id.required'=>'Pls Fill Out This Field'
        ];
    }
}
