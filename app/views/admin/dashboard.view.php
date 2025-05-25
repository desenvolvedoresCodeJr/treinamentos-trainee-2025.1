<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeNews | Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/public/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
</head>
<body>
    <div class="dashboard-center">
        <div class="welcome-box">
            <h1>Bem-vindo à Dashboard</h1>
        </div>
        
        <div class="buttons-container">
            <a href="/crudUsuarios" class="action-btn">
                <span class="material-symbols-outlined">group</span>
                Usuários
            </a>
            
            <a href="/crudPosts" class="action-btn">
                <span class="material-symbols-outlined">newspaper</span>
                Posts
            </a>
            
            <a href="/logout" class="action-btn logout">
                <span class="material-symbols-outlined">logout</span>
                Sair
            </a>
        </div>
    </div>
</body>
</html>