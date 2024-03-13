<?php

namespace App\Http\Requests\Variation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class VariationStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:150', 'string'],
            'seo' => ['required', 'min:3', 'max:150', 'string'],
            'productId' => ['integer', 'exists:products,id'],
            'variationId' => ['integer', 'exists:variations,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "Title Required",
            'seo' => "Seo Required",
            'productId' => "productId Required",
            'variationId' => "variationId",
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
