<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuejaStoreRequest extends FormRequest
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
            'detalle' => 'required',
            'id_sucursal' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'detalle.required' => 'Detalle requerido',
            'id_sucursal.required' => 'Sucursal requerida',
        ];
    }
}
