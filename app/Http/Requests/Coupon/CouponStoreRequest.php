<?php

namespace App\Http\Requests\Coupon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CouponStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'userId' => ['required', 'integer', 'exists:users,id'],
            'code' => ['required', 'min:3', 'max:150', 'string'],
            'title' => ['required', 'min:3', 'max:150', 'string'],
            'description' => ['required', 'min:3', 'max:255', 'string'],
            'type' => ['required', 'min:3', 'max:150', 'string'],
            'price' => ['required','numeric'],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date'],
        ];
    }

    public function attributes(): array
    {
        return [
            'userId' => "userId Required",
            'code' => "code Required",
            'title' => "title Required",
            'description' => "description Required",
            'type' => "type Required",
            'price' => "price Required",
            'startDate' => "startDate Required",
            'endDate' => "endDate Required"
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
