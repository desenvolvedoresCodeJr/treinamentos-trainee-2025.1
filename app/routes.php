<?php

namespace App\Controllers;
use App\Controllers\UsuariosController;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('', 'ExampleController@index');
    
    //get e post: ação que está sendo solicitada ao servidor
    //get: Solicitar dados de um recurso específico
    //post: Enviar dados para serem processados


    //rotas usuarios
    $router->get('crudUsuarios', 'UsuariosController@index');
    $router->get('crudUsuarios/search', 'UsuariosController@index');
    $router->post('crudUsuarios/create', 'UsuariosController@store');
    $router->post('crudUsuarios/edit', 'UsuariosController@edit');
    $router->post('crudUsuarios/delete', 'UsuariosController@delete');

    //rotas posts
    $router->get('crudPosts', 'PostsController@index');
    $router->get('crudPosts/search', 'PostsController@index'); 
    $router->post('crudPosts/create', 'PostsController@store');
    $router->post('crudPosts/edit', 'PostsController@edit');
    $router->post('crudPosts/delete', 'PostsController@delete');


    //rotas post individual
    $router->get('postIndividual', 'IndividualController@index');
    $router->get('postIndividual/create', 'IndividualController@store');
    $router->get('postIndividual/delete', 'IndividualController@delete');