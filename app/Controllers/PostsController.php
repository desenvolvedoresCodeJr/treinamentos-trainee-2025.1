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
                return redirect('admin/crudPosts');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if ($inicio > $rows_count) {
            return redirect('admin/crudPosts');
        }

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $usuarios = App::get('database')->selectAllWithSearch('posts', 'nome', $_GET['search'], $inicio, $itensPage);
            $rows_count = App::get('database')->countAllWithSearch('posts', 'nome', $_GET['search']);
        } else {
            $posts = App::get('database')->selectAll('posts', $inicio, $itensPage, null);
        }

        $total_pages = ceil($rows_count / $itensPage);

        if ($page > $total_pages) {
            header('Location: /crudPosts?paginacaoNumero=1');
            exit;
        }

        // Send them to the Crud Usuarios page in Compact
        return view('admin/crudPosts', compact('posts', 'page', 'total_pages'));
    }

    public function store()
    {

        $temporario = $_FILES['imagem']['tmp_name'];
        
        $nomeimagem =  sha1(uniqid($_FILES['imagem']['name'], true)) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

        $destinoimagem = "public\assets\imagensPosts";

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
        $parameters = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'imagem' => $_POST['imagem'],
            'criado_em' => $_POST['criado_em'],
            'id_autor' => $_POST['id_autor'],
        ];

        $id = $_POST['id'];

        App::get('database')->update('posts', $id, $parameters);

        header('Location: /crudPosts');
    }
    
    public function delete()
    {
        $id = $_POST['id'];
        App::get('database')->delete('posts', $id);

        header('Location: /crudPosts');
    }
}



?>