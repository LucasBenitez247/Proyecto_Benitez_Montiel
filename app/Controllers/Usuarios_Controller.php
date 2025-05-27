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
        'email' => 'required|valid_email|is_unique[usuarios.mail_usuario]',
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
            'valid_email' => 'La dirección de correo debe ser válida',
            'is_unique'=> 'El usuario ya se encuentra registrado'
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

   public function buscar_usuario(){
    $validation = \Config\Services::validation();
    $request = \Config\Services::request();
    $session = session();

    // Reglas de validación
    $validation->setRules ( 
        [

        'email' => 'required|valid_email',
        'password'=> 'required|min_length[8]',
         
    ],
    [
        'email' => [
                'required' => 'El correo electrónico es obligatorio',
                'valid_email' => 'La dirección de correo debe ser válida'
        ],
        'password' => [
                'required' => 'La contraseña es requerida',
                'min_length' => 'La contraseña debe tener un mínimo de 8 caracteres'
        ]
    ]  
    
);

    if (!$validation->withRequest($request)->run() ){
       
        // Si la validación falla, mostrar vista con errores
        $data['titulo'] = 'Login';
        $data['validation'] = $validation->getErrors();
        return view('Plantilla/header_view', $data)
            . view('Plantilla/nav_view')
            . view('Contenido/Login.php')
            . view('Plantilla/footer_view.php');
    }

    // Validación OK, buscar usuario
    $email = $request->getPost('email');
    $password = $request->getPost('password');

    $userModel = new Usuarios_model();
    $user = $userModel->where('mail_usuario', $email)->first();

    if ($user && password_verify($password, $user['contrasenia_usuario'])) {
        // Guardar datos de sesión
        $data = [
            'id'       => $user['id_usuario'],
            'nombre'   => $user['nombre_usuario'],
            'apellido' => $user['apellido_usuario'],
            'perfil'   => $user['id_perfil'],
            'login'    => TRUE
        ];

        $session->set($data);

        // Redireccionar según el perfil
        switch ($user['id_perfil']) {
            case '1':
                return redirect()->route('user_admin'); // administrador
            case '2':
                return redirect()->route('/'); // cliente
        }
    } else {
        // Usuario o contraseña incorrectos
    
        return redirect()->route('login')
        ->with('mensaje', 'Usuario y/o contraseña incorrectos');
    }
}


        public function cerrar_session(){
            $session = session();
            $session->destroy();
            return  redirect()->route('login_cliente');
        }

        public function admin(){
            $data ['titulo'] = 'index';
            return view('Plantilla/header_view', $data).view('Plantilla/nav_adm_view.php').view('Backend/contenido_admin');

        }


    }



