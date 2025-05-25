<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController {
    public function exibirLogin(){
        return view('admin/login');
    }

    public function exibirDashboard(){
        return view('admin/dashboard');
    }
}
