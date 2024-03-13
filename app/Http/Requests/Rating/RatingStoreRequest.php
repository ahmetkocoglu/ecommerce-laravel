<?php

namespace App\Http\Requests\Rating;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RatingStoreRequest extends FormRequest
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
            'rating' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'productId' => "productId Required",
            'userId' => "userId Required",
            'rating' => "rating Required",
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
