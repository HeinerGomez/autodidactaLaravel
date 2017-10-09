<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestMessage extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'message' => ['required', 'max:150', 'min:10']
        ];
    }

    // piso funcion reservada en este objeto para personalizar los mensajes
    public function messages() 
    {
        return [
            'message.required' => 'Debes enviar un mensaje!',
            'message.max' => 'El mensaje no puede superar los 150 caracteres!',
            'message.min' => 'El mensaje no puede se menor a 5 caracteres!'
        ];
    }
}
