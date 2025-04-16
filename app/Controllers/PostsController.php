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
        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
        ];

        App::get('database')->insert('posts', $parameters);
        
        header('Location: /crudPosts');
    }

    public function edit()
    {
        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
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