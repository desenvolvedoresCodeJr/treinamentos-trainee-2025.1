<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeNews | Login</title>

    <!-- link font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />

    <!-- link css -->
    <link rel="stylesheet" href="/public/css/login.css">

    <!-- link icons -->
    <script src="https://kit.fontawesome.com/654def639f.js" crossorigin="anonymous"></script>

</head>
<body>
      <main class="main-login">
        <div class="container-login">
                <form action="/login" method="POST" class="content-login">
                    <div class="mensagem-erro">
                        <p>
                            <?php 
                                if(isset($_SESSION['mensagem-erro']))
                                echo $_SESSION['mensagem-erro'];
                                unset($_SESSION['mensagem-erro']);
                            ?>
                        </p>
                    </div>
                    <div class="input-login">
                        <div class="box-input">
                            <h4>E-mail:</h4>
                            <input type="email" name="email" id="email-input">
                        </div>
                        <div class="box-input">
                            <h4>Senha:</h4>
                            <div id="password-box">
                                <input type="password" name="senha" id="password-input">
                                <i class="fa-solid fa-eye" id="icon-password" onclick="toggleTypeInputPassword('password-input')"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-button">
                        <button> Entrar </button>
                    </div>
                </form>
        </div>
      </main>
</body>

    <script src="../../../public/js/login.js"></script>

</html>