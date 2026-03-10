<?php

namespace App\Http\Requests\CasillaElectronica;

use Illuminate\Foundation\Http\FormRequest;

class StoreCasillaElectronicaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'dni'            => 'required|string|size:8|unique:personas,dni',
            'primernombre'   => 'required|string|max:70',
            'otrosnombres'   => 'nullable|string|max:70',
            'ape_pat'        => 'required|string|max:60',
            'ape_mat'        => 'required|string|max:60',
            'celular'        => 'nullable|string|max:11',
            'email'          => 'nullable|email|max:70',
            'direccion'      => 'nullable|string',
            'mailbox_number' => 'nullable|string|unique:casilla_electronicas,mailbox_number',
            'tipo_casilla_id' => 'required|exists:tipo_casillas,id',
            'status'         => 'nullable|string',
            'activated_at'   => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max'      => 'Ingrese Máximo :max caracteres',
            'size'     => 'Debe ingresar exactamente :size caracteres',
            'string'   => 'Ingrese caracteres alfanuméricos',
            'unique'   => 'El :attribute ya existe',
            'exists'   => 'El usuario seleccionado no es válido',
            'in'       => 'El tipo de usuario seleccionado no es válido',
        ];
    }
}
