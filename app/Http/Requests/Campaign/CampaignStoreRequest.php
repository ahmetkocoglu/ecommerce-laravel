<?php

namespace App\Http\Requests\Campaign;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CampaignStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'productId' => ['required', 'integer', 'exists:products,id'],
            'title' => ['required', 'min:3', 'max:150', 'string'],
            'description' => ['required', 'min:3', 'max:255', 'string'],
            'type' => ['required', 'max:20', 'string'],
            'price' => ['required', 'integer'],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date'],
        ];
    }

    public function attributes(): array
    {
        return [
            'productId' => "productId Required",
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
