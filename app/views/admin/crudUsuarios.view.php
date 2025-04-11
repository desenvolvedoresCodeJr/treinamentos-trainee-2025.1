<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Usuarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Bem vindo ao CRUD Usuarios</h1>
    </header>

    <main class="container my-4">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#criarmodal">Criar</button>
                <?php foreach($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario->id ?></td>
                        <td><?= $usuario->nome ?></td>
                        <td><?= $usuario->email ?></td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#visualizarModal-<?= $usuario->id ?>">Visualizar</button> 
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal-<?= $usuario->id ?>">Editar</button> 
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletarModal-<?= $usuario->id ?>">Deletar</button>
                        </td>
                    </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </main>
    <?php foreach($usuarios as $usuario): ?>

            <!-- Modal Visualizar -->
            <?php require('C:\Users\diego\OneDrive\Documentos\treinamentos-trainee-2025.1\app\views\admin\modais\usuarios\modal_visualizar.php'); ?>

            <!-- Modal Editar -->
            <?php require('C:\Users\diego\OneDrive\Documentos\treinamentos-trainee-2025.1\app\views\admin\modais\usuarios\modal_editar.php'); ?>
            

            <!-- Modal Deletar -->
            <?php require('C:\Users\diego\OneDrive\Documentos\treinamentos-trainee-2025.1\app\views\admin\modais\usuarios\modal_deletar.php'); ?>
       
    <?php endforeach; ?>

  <!-- Modal Criar -->
  <?php require('C:\Users\diego\OneDrive\Documentos\treinamentos-trainee-2025.1\app\views\admin\modais\usuarios\modal_criar.php'); ?>

    <!-- Bootstrap JS (optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

