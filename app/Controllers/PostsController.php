<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostsController
{
public function index()
{
    $page = 1;
    if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
        $page = intval($_GET['paginacaoNumero']);

        if ($page <= 0) {
            return redirect('crudPosts');
        }
    }

    $itensPage = 5;
    $inicio = $itensPage * $page - $itensPage;

    // Ordenação
    $ordenar = $_GET['ordenar'] ?? 'mais_recente';
    $orderClause = match ($ordenar) {
        'mais_antigo' => 'id ASC',
        'relevancia'  => 'like_counter DESC',
        default       => 'id ASC'
    };

    // Contagem de registros e busca
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $posts = App::get('database')->selectAllWithSearch('posts', 'titulo', $_GET['search'], $inicio, $itensPage, $orderClause);
        $rows_count = App::get('database')->countAllWithSearch('posts', 'titulo', $_GET['search']);
    } else {
        $rows_count = App::get('database')->countAll('posts');
        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage, $orderClause);
    }

    $total_pages = max(1, ceil($rows_count / $itensPage));

    if ($page > $total_pages) {
        header('Location: /crudPosts?paginacaoNumero=1');
        exit;
    }

    return view('admin/crudPosts', compact('posts', 'page', 'total_pages'));
}


    public function store()
    {

        $temporario = $_FILES['imagem']['tmp_name'];
        
        $nomeimagem =  sha1(uniqid($_FILES['imagem']['name'], true)) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

        $destinoimagem = "public/assets/imagensPosts/";

        move_uploaded_file($temporario, $destinoimagem . $nomeimagem);

        $caminhodaimagem = "public\assets\imagensPosts/" . $nomeimagem;

        $parameters = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'imagem' =>  $caminhodaimagem,

            'id_autor' => 1,

        ];

        App::get('database')->insert('posts', $parameters);
        
        header('Location: /crudPosts');
    }

    public function edit()
    {
        $id = $_POST['id'];
        $post = App::get('database')->selectAllWithSearch('posts', 'id', $id);
        
        if (count($post) > 0) {
            $post = $post[0];
            $caminhoImagem = $post->imagem;
    
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $temporario = $_FILES['imagem']['tmp_name'];
                $nomeimagem = sha1(uniqid($_FILES['imagem']['name'], true)) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                $destinoimagem = "public/assets/imagensPosts/";
                move_uploaded_file($temporario, $destinoimagem . $nomeimagem);
                $caminhoImagem = "public\\assets\\imagensPosts\\" . $nomeimagem;
    
                if (file_exists($post->imagem)) {
                    unlink($post->imagem);
                }
            }
        }
    
        $parameters = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'imagem' => $caminhoImagem,
            'criado_em' => $_POST['criado_em'],
            'id_autor' => $_POST['id_autor'],
        ];
    
        App::get('database')->update('posts', $id, $parameters);
        header('Location: /crudPosts');
    }
    
    public function delete()
    {
        $id = $_POST['id'];
    
        $posts = App::get('database')->selectAllWithSearch('posts', 'id', $id);
        if(count($posts) >0){
            $post = $posts[0];
        }
        
        if(isset($post->imagem)){
            $caminhodaimagem = $post->imagem;
        }
        
        if(file_exists($caminhodaimagem)){
            unlink($caminhodaimagem);
        }

        App::get('database')->delete('posts', $id);


        header('Location: /crudPosts');

    }
}



?>