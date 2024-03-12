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

        ];
    }

    public function attributes(): array
    {
        return [

        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
