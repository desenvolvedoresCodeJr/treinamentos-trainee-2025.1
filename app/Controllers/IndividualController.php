<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class IndividualController
{

    public function index($id)
    {
        $post = App::get('database')->selectOne('posts', $id);
        $usuarios = App::get('database')->selectAll('usuarios');

        if (!$post) {
            throw new Exception("Post não encontrado.");
        }

        return view('site/post-individual' , compact('post', 'usuarios'));

    }

    public function store()
    {
        $parameters = [
            'texto' => $_POST['texto'],
            'id_autor' => 1,
        ];
        
        App::get('database')->insert('comentarios' , $parameters);

        header('Location: /postIndividual');
    }

    public function delete()
    {
        $parameters = [
            'id' => $_POST['id'],
        ];

        App::get('database')->delete('posts', $parameters['id']);
        
        return view('site/postIndividual');
    }
}