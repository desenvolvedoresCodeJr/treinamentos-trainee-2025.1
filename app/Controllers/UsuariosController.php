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

    public function store()
    {
        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
        ];

        App::get('database')->insert('usuarios', $parameters);
        
        header('Location: /crudUsuarios');
    }

    public function edit()
    {
        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
        ];

        $id = $_POST['id'];

        App::get('database')->update('usuarios', $id, $parameters);

        header('Location: /crudUsuarios');
    }
    
    public function delete()
    {
        $id = $_POST['id'];

        App::get('database')->delete('usuarios', $id);

        header('Location: /crudUsuarios');
    }
}



?>