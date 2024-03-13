<?php

namespace App\Http\Requests\Content;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContentStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:150', 'string'],
            'description' => ['required', 'min:3', 'max:150', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "Title Required",
            'description' => "Description Required",
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
