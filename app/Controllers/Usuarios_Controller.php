<?php

namespace App\Controllers;

use App\Models\Usuarios_model;

class Usuarios_controller extends BaseController
{
    public function add_cliente(){

$validation = \Config\Services::validation();
$request = \Config\Services::request();

$validation->setRules(
    [
        'nombre' => 'required|max_length[150]',
        'apellido' => 'required|max_length[150]',
        'email' => 'required|valid_email',
        'telefono' => 'required|max_length[15]|min_length[7]',
        'password'=> 'required|min_length[8]',
        'confirmPassword'=> 'required|min_length[8]|matches[password]',
         
    ],

     [   // Errors
        'nombre' => [
            'required' => 'El nombre es requerido',
            'max_length' => 'El nombre debe tener como máximo 150 caracteres'
        ],

        'apellido' => [
            'required' => 'El apellido es requerido',
            'max_length' => 'El apellido debe tener como máximo 150 caracteres'
        ],
         'email' => [
            'required' => 'El correo electrónico es obligatorio',
            'valid_email' => 'La dirección de correo debe ser válida'
                ],

          'telefono'   => [
            'required'      => 'El telefono es obligatorio',
            'max_length'    => 'El número telefónico debe tener un maximo de 15 caracteres',
            'min_length'    => 'El número telefónico debe tener un minimo de 7 caracteres'
                ],

        'password' => [
            'required' => 'La contraseña es requerida',
            'min_length'    => 'La contraseña debe tener un minimo de 8 caracteres'
        ],
        'confirmPassword'=> [
            'required' => 'Repetir la contraseña es requerida',
            'min_length'=> ' Repetir la contraseña debe tener un minimo de 8 caracteres',
            'matches'=>'Las contraseñas deben coincidir'

        ]
    ]
);

if ($validation->withRequest($request)->run() ){

     $data = [
        'nombre_usuario' => $request->getPost('nombre'),
        'apellido_usuario' => $request->getPost('apellido'),
        'mail_usuario' => $request->getPost('email'),
        'telefono_usuario' => $request->getPost('telefono'),
        'contrasenia_usuario' => password_hash($request->getPost('password'),PASSWORD_BCRYPT ),
        'id_perfil'=> 2,
        'estado_usuario'=> 1
            ];

            $registro_usuario = new Usuarios_model();
            $registro_usuario->insert($data);
            return redirect()->route('registro')->with('mensaje', 'Su registro se realizó exitosamente!');
            }else{
                $data['titulo'] = 'Registrarse';
                $data['validation'] = $validation->getErrors();
                return view('Plantilla/header_view', $data).view('Plantilla/nav_view').view('Contenido/Registrar.php').view('Plantilla/footer_view.php');
            }
}

}