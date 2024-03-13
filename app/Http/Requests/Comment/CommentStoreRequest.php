<?php

namespace App\Http\Requests\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CommentStoreRequest extends FormRequest
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
            'comment' => ['required', 'min:3', 'max:150', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'productId' => "productId Required",
            'userId' => "userId Required",
            'comment' => "comment Required",
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
