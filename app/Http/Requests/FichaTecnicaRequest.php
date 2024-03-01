<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FichaTecnicaRequest extends FormRequest
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
        if ($this->isMethod('PUT')) {
            return [
                'foto'               => 'max:4096',
                'ficha_tecnica'      => 'max:4096',
                'nombre'             => 'required|max:191',
                'nombre_cientifico'  => 'required|max:191',
                'familia'            => 'required|max:191',
                'origen'             => 'required|max:191',
                'propagacion'        => 'required|max:191',
                'altitud_siembra'    => 'required|max:191',
                'descripcion'        => 'required',
                'detalle_flor'       => 'image|max:4096',
                'detalle_hoja'       => 'image|max:4096',
                'detalle_tronco'     => 'image|max:4096',
                'detalle_fruto'      => 'image|max:4096',
                'detalle_tallo'      => 'image|max:4096',
                'caracteristica'     => 'required|max:191',
            ];
        } else {
            return [
                'foto'               => 'required|max:4096',
                'ficha_tecnica'      => 'required|max:4096',
                'nombre'             => 'required|max:191',
                'nombre_cientifico'  => 'required|max:191',
                'familia'            => 'required|max:191',
                'origen'             => 'required|max:191',
                'propagacion'        => 'required|max:191',
                'altitud_siembra'    => 'required|max:191',
                'descripcion'        => 'required',
                'detalle_flor'       => 'image|max:4096',
                'detalle_hoja'       => 'image|max:4096',
                'detalle_tronco'     => 'image|max:4096',
                'detalle_fruto'      => 'image|max:4096',
                'detalle_tallo'      => 'image|max:4096',
                'caracteristica'     => 'required|max:191',
            ];
        }
    }

    public function messages()
    {
        return [
            'foto.required'                 => 'La foto principal es requerida',
            'foto.max'                      => 'El tamaño del archivo debe ser máximo 4MB',
            'ficha_tecnica.required'        => 'La ficha técnica de la planta es requerida',
            'ficha_tecnica.max'             => 'El tamaño del archivo debe ser máximo 4MB',
            'nombre.required'               => 'El nombre de la planta es requerida',
            'nombre.max'                    => 'El máximo permitido son 191 caracteres',
            'nombre_cientifico.required'    => 'El nombre científico de la planta es requerido',
            'nombre_cientifico.max'         => 'El máximo permitido son 191 caracteres',
            'familia.required'              => 'La familia de la planta es requerida',
            'familia.max'                   => 'El máximo permitido son 191 caracteres',
            'origen.required'               => 'El origen de la planta es requerido',
            'origen.max'                    => 'El máximo permitido son 191 caracteres',
            'propagacion.required'          => 'La propagación de la planta es requerida',
            'propagacion.max'               => 'El máximo permitido son 191 caracteres',
            'altitud_siembra.required'      => 'La alititud de siembra de la planta es requerida',
            'altitud_siembra.max'           => 'El máximo permitido son 191 caracteres',
            'descripcion.required'          => 'La descripción de la planta es requerida',
            'detalle_flor.max'              => 'El tamaño del archivo debe ser máximo 4MB',
            'detalle_hoja.max'              => 'El tamaño del archivo debe ser máximo 4MB',
            'detalle_tronco.max'            => 'El tamaño del archivo debe ser máximo 4MB',
            'detalle_fruto.max'             => 'El tamaño del archivo debe ser máximo 4MB',
            'detalle_tallo.max'             => 'El tamaño del archivo debe ser máximo 4MB',
            'caracteristica.required'       => 'La característica de la planta es requerida',
            'caracteristica.max'            => 'El máximo permitido son 191 caracteres',
        ];
    }
}
