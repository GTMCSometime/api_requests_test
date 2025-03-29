<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'comment' => 'required|string',
            'email' => 'required|email',
        ];
    }

    public function messages() {
        return [
            'comment.required' => 'Заполните заявку',
            'comment.string' => 'Некорректный тип данных',
        ];
    }
}
