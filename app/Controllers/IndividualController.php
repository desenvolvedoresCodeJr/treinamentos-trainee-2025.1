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
    $id = $_POST['id'];
    $id_post = $_POST['id_post'];

    App::get('database')->delete('comentarios', $id);

    header("Location: /postIndividual/$id_post");

}


public function like()
{
    $post_id = (int) $_POST['post_id'];
    $parameters = [
        'autor_id' => 1,
        'post_id' => $post_id,
    ];

        // Ensure post_id is an integer
    $post_id = (int) $post_id;

    // Insert the like
    App::get('database')->insert('likes', $parameters);

    // Count likes for this post
    $likeCount = App::get('database')->countAllWithSearch('likes', 'post_id', $post_id);
    var_dump($likeCount);
    // Update the like_counter in posts table
    App::get('database')->update('posts', ['like_counter' => $likeCount], ['id' => $post_id]);

    header("Location: /postIndividual/" . $post_id);
}

}