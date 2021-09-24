<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MunicipioStoreRequest extends FormRequest
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
            //
            'nombre' => 'required',
            'id_departamento' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Nombre de Municipio requerido',
            'id_departamento.required' => 'Departamento requerido'
        ];
    }
}
