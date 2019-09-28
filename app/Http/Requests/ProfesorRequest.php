<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesorRequest extends FormRequest
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
    public function rules(){
        return [
        'dni_pro'=>'unique:profesores|string|min:7|max:8',
        'legajo_pro'=>'unique:profesores',
        'nroderegistro_pro'=>'unique:profesores',
        'correo_pro'=>'unique:profesores',
        ];
    }

    public function messages(){
        return [
        'dni_pro.unique' => 'El Dni ingresado pertenece a otra persona',
        'legajo_pro.unique' => 'El N° de Legajo pertenece a otra persona',
        'dni_pro.max' => 'Te has pasado de caracteres, solo 8',
        'nroderegistro_pro.unique' => 'El N° de Registro pertenece a otra persona',
        'correo_pro.unique' => 'El Correo Electronico pertenece a otra persona'
        ];
    }
}