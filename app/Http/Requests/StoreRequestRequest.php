<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'message' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'name.required' => "Это поле необходимо заполнить",
            'name.string' => "Данные должны соответствовать строчному типу",
            'email.required' => "Это поле необходимо заполнить",
            'email.string' => "Введите корректный email",
            'message.required' => 'Необходимо ввести сообщение',
            'message.string' => 'Данные должны соответствовать строчному типу',
        ];
    }

}
