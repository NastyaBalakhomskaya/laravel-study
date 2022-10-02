<?php

namespace App\Http\Requests\Actor;

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
            'last_name' => ['required', 'min:1', 'max:45'],
            'first_name' => ['required', 'min:1', 'max:45'],
            'patronymic' => ['required', 'min:1', 'max:45'],
            'birthday' => ['required'],
            'height' => ['required', 'integer'],
        ];
    }
}
