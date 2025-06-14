<?php

namespace App\Controllers;

use App\Models\Consulta_model;
use App\Models\Usuarios_model;

class Consulta_Controller extends BaseController
{

public function add_consulta(){

$validation = \Config\Services::validation();
$request = \Config\Services::request();

$validation->setRules(
    [
        'nombre' => 'required|max_length[150]',
         'email' => 'required|valid_email',
         'telefono' => 'required|max_length[15]|min_length[7]',
         'mensaje' => 'required|max_length[250]|min_length[10]',
    ],
    [   // Errors
        'nombre' => [
            'required' => 'El nombre es requerido',
            'max_length' => 'El nombre debe tener como máximo 150 caracteres'
        ],

         'email' => [
            'required' => 'El correo electrónico es obligatorio',
            'valid_email' => 'La dirección de correo debe ser válida'
                ],

          'telefono'   => [
            "required"      => 'El telefono es obligatorio',
            "max_length"    => 'El número telefónico debe tener un maximo de 15 caracteres',
            "min_length"    => 'El número telefónico debe tener un minimo de 7 caracteres'
                ],

        'mensaje' => [
            'required' => 'La consulta es requerido',
            'min_length' =>'La consulta debe tener como mínimo 10 caracteres',
            'max_length'    => 'La consulta debe tener como máximo 200 caracteres',
        ],
    ]
);

if ($validation->withRequest($request)->run() ){

     $data = [
        'nombre_mensaje' => $request->getPost('nombre'),
        'correo_mensaje' => $request->getPost('email'),
        'telefono_mensaje' => $request->getPost('telefono'),
        'texto_mensaje' => $request->getPost('mensaje') 
            ];

               $consulta = new Consulta_model();
               $consulta->insert($data);

              return redirect()->route('contacto')->with('texto_mensaje', 'Su consulta se envió exitosamente!');
                        
                }else{

                 $data['titulo'] = 'Contacto';
                $data['validation'] = $validation->getErrors();
                return view('Plantilla/header_view', $data).view('Plantilla/nav_view').view('Contenido/contacto').view('Plantilla/footer_view.php');
 

                }

        }

        public function ver_consultas()
        {
             
            $consulta_model = new Consulta_model();
            $data['consultas'] = $consulta_model->findAll();
           
            $data['titulo'] = 'Ver Consultas';
            return view('Plantilla/header_view', $data)
                .view('Plantilla/nav_adm_view', $data)
                .view('Backend/Ver_consultas.php', $data)
                .view('Plantilla/footer_view.php', $data);
        }
}