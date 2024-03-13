<?php

namespace App\Http\Requests\Menu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MenuStoreRequest extends FormRequest
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
            'menuId' => ['integer', 'exists:menus,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "Title Required",
            'seo' => "Seo Required",
            'menuId' => "menuId",
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors()->toArray()));
    }
}
