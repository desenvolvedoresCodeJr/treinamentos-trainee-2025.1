<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController
{
    public function index()
    {

        $usuarios = App::get('database')->selectAll('posts');
        
        return view('admin/crudPosts', compact('posts'));
    }

}



?>