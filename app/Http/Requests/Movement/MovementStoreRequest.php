<?php

namespace App\Http\Requests\Movement;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MovementStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'productId' => ['required', 'integer', 'exists:products,id'],
            'userId' => ['required', 'integer', 'exists:users,id'],
            'movementId' => ['integer', 'exists:movements,id'],
            'type' => ['integer'],
            'processType' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'discountPrice' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'tax' => ['required', 'integer'],
            'total' => ['required', 'integer'],
            'description' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'productId' => "productId Required",
            'userId' => "userId Required",
            'movementId' => "movementId",
            'type' => "type",
            'processType' => "type",
            'price' => "price Required",
            'discountPrice' => "discountPrice Required",
            'quantity' => "quantity Required",
            'tax' => "tax Required",
            'total' => "total Required",
            'description' => "description Required",
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
