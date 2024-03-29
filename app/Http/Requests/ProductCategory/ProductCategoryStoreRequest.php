<?php

namespace App\Http\Requests\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductCategoryStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'productId' => ['required', 'integer', 'exists:products,id'],
            'categoryId' => ['required', 'integer', 'exists:categories,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'productId' => "productId Required",
            'categoryId' => "categoryId Required",
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
