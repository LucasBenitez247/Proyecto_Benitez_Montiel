<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Adm_auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        // Suponiendo que 'perfil' es el campo que identifica al admin (por ejemplo, 1)
        if (!$session->get('login') || $session->get('perfil') != 1) {
            return redirect()->to('/login')->with('error', 'Acceso solo para administradores.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}