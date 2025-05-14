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
        $comentarios = App::get('database')->selectAllWithSearch('comentarios', 'id_post', $id);

        if (!$post) {
            throw new Exception("Post não encontrado.");
        }

        return view('site/postIndividual', compact('post', 'usuarios', 'comentarios'));
    }

    public function store($id)
    {
        $parameters = [
            'texto' => $_POST['texto'],
            'id_autor' => 1,
            'id_post' => $id,
            'criado_em' => $_POST['criado_em'],
        ];

        App::get('database')->insert('comentarios', $parameters);

        header("Location: /postIndividual/{$id}");
    }

public function delete()
{
    $id = trim($_POST['id']);
    $id_post = trim($_POST['id_post']);

    App::get('database')->delete('comentarios', $id);

    var_dump($id_post);
    header("Location: /postIndividual/$id_post");

}
}