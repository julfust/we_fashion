<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        //     'title' => 'required|min:5',
        //     'price' => 'required',
        //     'productRef' => 'required',
        ];
    }

    public function messages()
    {
        return [
        //     'title.required' => 'Veuillez renseigner le titre du produit',
        //     'title.min' => 'Le titre doit faire plus de 5 caractère',
        //     'price.required' => 'Veuillez renseigner le prix du produit',
        //     'productRef.required' => 'Veuillez renseigner la référence du produit',
        ];
    }
}
