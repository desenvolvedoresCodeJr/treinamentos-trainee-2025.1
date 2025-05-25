<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController {
    public function exibirLogin(){
        session_start();

        if(isset($_SESSION['id'])){
            header('Location: /dashboard');
        }

        return view('admin/login');
    }

    public function exibirDashboard(){
        return view('admin/dashboard');
    }

    public function executalogin(){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $user = App::get(key: 'database')->verificaLogin($email, $senha);

        if($user != false){
            session_start();
            $_SESSION['id'] = $user->id;
            $_SESSION['user'] = $user;
            header('Location: /dashboard');
        }
        else {
            session_start();
            $_SESSION['mesnagem-erro'] = "Email e/ou senha incorretos";
            header('Location: /login');
        }
    }

    public function executaLogout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: /login');
    }
}
