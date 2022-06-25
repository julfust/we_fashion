<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => 'required|min:5',
            'description' => 'required',
            'price' => 'required',
            'productRef' => 'required|size:16'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Veuillez renseigner le titre du produit',
            'title.min' => 'Le titre doit faire plus de 5 caractères',
            'description.required' => 'Veuillez renseigner la description du produit',
            'price.required' => 'Veuillez renseigner le prix du produit',
            'productRef.required' => 'Veuillez renseigner la référence du produit',
            'productRef.size' => 'La référence du produit doit faire 16 caractères'
        ];
    }
}
