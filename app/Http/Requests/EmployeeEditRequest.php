<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployeeEditRequest extends Request
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
            'nombre' => 'required',
            'empresa' => 'required',
            'sucursal' => 'required',
            'departamento' => 'required',
            'horario' => 'required',
            'rol' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
            'domicilio' => 'required',
            'codigoPostal' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'correo' => 'required|unique:employees,email,'.$this->segment(3),
            
        ];
    }
}