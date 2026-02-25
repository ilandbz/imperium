<?php

namespace App\Http\Requests\CasillaElectronica;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCasillaElectronicaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Get user/persona ID related to the casilla
        $casilla = \App\Models\CasillaElectronica::find($this->id);
        $dniId = $casilla && $casilla->user ? $casilla->user->dni : null;
        $personaId = $casilla && $casilla->user && $casilla->user->persona ? $casilla->user->persona->id : null;

        return [
            'dni'            => 'required|string|size:8|unique:personas,dni,' . $personaId,
            'primernombre'   => 'required|string|max:70',
            'otrosnombres'   => 'nullable|string|max:70',
            'ape_pat'        => 'required|string|max:60',
            'ape_mat'        => 'required|string|max:60',
            'celular'        => 'nullable|string|max:11',
            'email'          => 'nullable|email|max:70',
            'direccion'      => 'nullable|string',
            'mailbox_number' => 'required|string|unique:casilla_electronicas,mailbox_number,' . $this->id,
            'user_type'      => 'required|in:abogado,fiscal,institucion,persona_natural',
            'status'         => 'nullable|string',
            'activated_at'   => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max'      => 'Ingrese Máximo :max caracteres',
            'string'   => 'Ingrese caracteres alfanuméricos',
            'unique'   => 'El :attribute ya existe',
            'exists'   => 'El usuario seleccionado no es válido',
            'in'       => 'El tipo de usuario seleccionado no es válido',
        ];
    }
}
