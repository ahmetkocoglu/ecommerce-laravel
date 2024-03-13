<?php

namespace App\Http\Requests\Price;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PriceStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'productId' => ['required', 'integer', 'exists:products,id'],
            'price' => ['required', 'integer'],
            'discountPrice' => ['required', 'integer'],
            'discountRate' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'productId' => "productId Required",
            'price' => "price Required",
            'discountPrice' => "discountPrice Required",
            'discountRate' => "discountRate Required"
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
