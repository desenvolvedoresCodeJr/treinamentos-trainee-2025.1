<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class IndividualController
{

    public function index()
    {
        return view('site/postIndividual');
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

        App::get('database')->delete('posts', $id);
        
        return view('site/postIndividual');
    }
}