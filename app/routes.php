<?php

namespace App\Controllers;
use App\Controllers\UsuariosController;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('', 'ExampleController@index');
    
    //get e post: ação que está sendo solicitada ao servidor
    //get: Solicitar dados de um recurso específico
    //post: Enviar dados para serem processados

    $router->get('crudUsuarios', 'UsuariosController@index');
    $router->post('crudUsuarios/create', 'UsuariosController@store');
    $router->post('crudUsuarios/edit', 'UsuariosController@edit');
    $router->post('crudUsuarios/delete', 'UsuariosController@delete');


    $router->get('crudPosts', 'PostsController@index');