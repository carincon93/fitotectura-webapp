<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministradorRequest extends FormRequest
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
                'nombre_completo'               => 'required|max:191',
                'email'                         => 'required|max:191|unique:users,id,:id',
                'telefono'                      => 'required|max:20',
                'profesion'                     => 'required|max:191',
                'uso'                           => 'required|max:191',
                'nombre_empresa_institucion'    => 'required|max:191',
                'rol'                           => 'max:191',
            ];
        } else {
            return [
                'nombre_completo'               => 'required|max:191',
                'email'                         => 'required|unique:users|max:191',
                'telefono'                      => 'required|max:20',
                'profesion'                     => 'required|max:191',
                'uso'                           => 'required|max:191',
                'nombre_empresa_institucion'    => 'required|max:191',
                'password_confirmation'         => 'required',
                'password'                      => 'required|confirmed|min:6|max:191',
                'rol'                           => 'max:191',
            ];
        }
    }
    public function messages()
    {
        return [
            'nombre_completo.required'              => 'El nombre es requerido',
            'nombre_completo.max'                   => 'El máximo permitido son 191 caracteres',
            'email.required'                        => 'El correo electrónico es requerido',
            'email.unique'                          => 'Esta dirección de correo electrónico ya está en uso',
            'email.max'                             => 'El máximo permitido son 191 caracteres',
            'telefono.required'                     => 'El número teléfono o celular es requerido',
            'telefono.max'                          => 'El máximo permitido son 20 caracteres',
            'profesion.required'                    => 'La profesión es requerida',
            'profesion.max'                         => 'El máximo permitido son 191 caracteres',
            'uso.required'                          => 'Por favor indique el área de utilización del sistema',
            'uso.max'                               => 'El máximo permitido son 191 caracteres',
            'nombre_empresa_institucion.required'   => 'El nombre de la Empresa o Institución es requerido',
            'nombre_empresa_institucion.max'        => 'El máximo permitido son 191 caracteres',
            'rol.max'                               => 'El máximo permitido son 191 caracteres',
            'password_confirmation.required'        => 'El campo Confirmar Contraseña es requerido',
            'password.required'                     => 'La contraseña es requerida',
            'password.confirmed'                    => 'Los contraseñas no coinciden',
            'password.min'                          => 'El mínimo permitido son 6 caracteres',
            'password.max'                          => 'El máximo permitido son 191 caracteres',
        ];
    }
}
