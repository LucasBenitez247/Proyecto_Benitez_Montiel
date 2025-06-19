<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // si el usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
        if (! session()->get('login')) {
            // Redirigir a la página de inicio de sesión
            return redirect()->to('login')
                ->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}