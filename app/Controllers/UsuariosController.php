<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController
{
    public function index()
    {
        $page = 1;
        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if ($page <= 0) {
                return redirect('admin/crudUsuarios');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('usuarios');

        if ($inicio > $rows_count) {
            return redirect('admin/crudUsuarios');
        }

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $usuarios = App::get('database')->selectAllWithSearch('usuarios', 'nome', $_GET['search'], $inicio, $itensPage);
            $rows_count = App::get('database')->countAllWithSearch('usuarios', 'nome', $_GET['search']);
        } else {
            $usuarios = App::get('database')->selectAll('usuarios', $inicio, $itensPage, null);
        }

        $total_pages = max(1, ceil($rows_count / $itensPage));

        if ($page > $total_pages) {
            header('Location: /crudUsuarios?paginacaoNumero=1');
            exit;
        }

        // Send them to the Crud Usuarios page in Compact
        return view('admin/crudUsuarios', compact('usuarios', 'page', 'total_pages'));
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