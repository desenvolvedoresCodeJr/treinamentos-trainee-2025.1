<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Usuarios</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/public/css/crudUsuarios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Bem vindo ao CRUD Usuarios</h1>
    </header>

    <main class="container my-4">
        <!-- Barra de Pesquisa-->
        <form class="d-flex mb-4" method="GET" action="/crudUsuarios/search">
            <input class="form-control me-2" type="search" placeholder="Pesquisar usuários" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>

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
                <?php if (!empty($usuarios) && is_array($usuarios)): ?>
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
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Nenhum usuário encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <?php foreach($usuarios as $usuario): ?>

            <!-- Modal Visualizar -->
            <?php require('app\views\admin\modais\usuarios\modal_visualizar.php'); ?>

            <!-- Modal Editar -->
            <?php require('app\views\admin\modais\usuarios\modal_editar.php'); ?>
            

            <!-- Modal Deletar -->
            <?php require('app\views\admin\modais\usuarios\modal_deletar.php'); ?>
       
    <?php endforeach; ?>
    <div class="paginas<?= $total_pages <= 1 ? " none" : "" ?>">
            <button class="anterior<?= $page <= 1 ? " disabled" : "" ?>"  onclick="location.href='?paginacaoNumero=<?= $page - 1 ?>'">
                < </button>
                    <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
                        <button class="pag1<?= $page_number == $page ? " active" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page_number ?>'"><?= $page_number ?></button>
                    <?php endfor ?>
            <button class="proximo<?= $page >= $total_pages ? " disabled" : "" ?>"  onclick="location.href='?paginacaoNumero=<?= $page + 1 ?>'">></button>
    </div>

  <!-- Modal Criar -->
  <?php require('app\views\admin\modais\usuarios\modal_criar.php'); ?>

    <!-- Bootstrap JS (optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

