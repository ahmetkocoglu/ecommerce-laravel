<?php

namespace App\Http\Requests\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:150', 'string', 'unique:products'],
            'seo' => ['required', 'min:3', 'max:150', 'string'],
            'tax' => ['integer', 'max:20'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "Title Required",
            'seo' => "Seo Required",
            'tax' => "Tax Required"
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
