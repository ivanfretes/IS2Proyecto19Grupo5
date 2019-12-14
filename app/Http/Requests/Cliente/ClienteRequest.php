<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Entidad\Ruc;
use App\Model\Common\Cliente;

class ClienteRequest extends FormRequest
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
            'nombre' => 'required|max:255',
            'apellido' => 'max:100',
            'celular' => 'max:30',
            'ci' => 'nullable|max:10',
            'telefono' => 'max:30',
            'ruc' => new Ruc(),
            'email' => 'nullable|max:100',
            'tipo_cliente' => 'required',
            'tipo_identificador' => 'required',
            'latitud' => 'nullable|max:30',
            'longitud' => 'nullable|max:30',
            'codigo' => 'nullable|max:30',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $mensajes = [
            'nombre.required' => 'Asigne un nombre al cliente',
            'tipo_cliente.required' => 'Asigne un tipo(empresa o persona) al cliente',
            'tipo_identificador.required' => 'Asigne un identificador(ruc o ci) al cliente'
        ];

        return $mensajes;
    }
}
