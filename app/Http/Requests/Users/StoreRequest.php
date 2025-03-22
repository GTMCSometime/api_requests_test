<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'name.required' => "Это поле необходимо заполнить",
            'name.string' => "Данные должны соответствовать строчному типу",
            'email.required' => "Это поле необходимо заполнить",
            'email.email' => "Введите корректный email",
            'email.unique' => "Почта занята",
            'message.required' => 'Заполните заявку',
            'message.string' => 'Некорректный тип данных',
        ];
    }
}
