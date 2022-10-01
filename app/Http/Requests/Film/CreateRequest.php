<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;


class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:1', 'max:255'],
            'year' => ['required', 'integer', 'digits:4'],
            'text' => ['required', 'min:100'],
            'actors' => ['required', 'array', 'min:1'],
            'actors.*' => ['required', 'exists:actors,id'],
            'genres' => ['required', 'array', 'min:1'],
            'genres.*' => ['required', 'exists:genres,id'],
        ];
    }
}

