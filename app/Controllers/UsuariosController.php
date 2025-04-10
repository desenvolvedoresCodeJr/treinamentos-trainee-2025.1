<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController
{
    public function index()
    {
        //Seleciona todos os usuarios da database
        $usuarios = App::get('database')->selectAll('usuarios');

        //Manda eles para a pagina do Crud Usuarios no Compact
        return view('admin/crudUsuarios', compact('usuarios'));
    }
}