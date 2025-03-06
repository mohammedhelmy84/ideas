<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrateIdeaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'content' => 'required',
                'content.required'=>'this is required'
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'The content field is required',

        ];
    }
}
