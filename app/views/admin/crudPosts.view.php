<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Posts</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require('app\views\admin\modais\header.php'); ?>
    <header class="bg-primary text-white text-center py-2">
        <h2 class="mb-0" style="font-size:1.5rem;">Bem vindo ao CRUD Posts</h2>
    </header>

    <main class="container my-4">

    <!-- Barra de Busca -->
    <form class="d-flex mb-4" method="GET" action="/crudPosts/search">
            <input class="form-control me-2" type="search" placeholder="Pesquisar Posts" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#criarmodal">Criar</button>
                <?php if (!empty($posts) && is_array($posts)): ?>
                    <?php foreach($posts as $post): 
                        $usuario = App\Core\App::get('database')->selectAll('usuarios', ['id' => $post->id_autor])[0]; ?>
                        <tr>
                            <td><?= $post->id ?></td>
                            <td><?= $post->titulo ?></td>
                            <td><?= $usuario->nome ?></td>
                            <td>
                                <a href="/postIndividual/<?= $post->id ?>" class="btn btn-primary">Página</a>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#visualizarModal-<?= $post->id ?>">Visualizar</button> 
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal-<?= $post->id ?>">Editar</button> 
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletarModal-<?= $post->id ?>">Deletar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Nenhum post encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <?php foreach($posts as $post): ?>

            <!-- Modal Visualizar -->
            <?php require('app\views\admin\modais\posts\modal_visualizar.php'); ?>

            <!-- Modal Editar -->
            <?php require('app\views\admin\modais\posts\modal_editar.php'); ?>
            

            <!-- Modal Deletar -->
            <?php require('app\views\admin\modais\posts\modal_deletar.php'); ?>
       
    <?php endforeach; ?>


    <!-- Paginacao -->
    <div class="d-flex justify-content-center mt-4<?= $total_pages <= 1 ? " d-none" : "" ?>">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item<?= $page <= 1 ? " disabled" : "" ?>">
                    <a class="page-link" href="?paginacaoNumero=<?= $page - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
                    <li class="page-item<?= $page_number == $page ? " active" : "" ?>">
                        <a class="page-link" href="?paginacaoNumero=<?= $page_number ?>"><?= $page_number ?></a>
                    </li>
                <?php endfor ?>
                <li class="page-item<?= $page >= $total_pages ? " disabled" : "" ?>">
                    <a class="page-link" href="?paginacaoNumero=<?= $page + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

  <!-- Modal Criar -->
  <?php require('app\views\admin\modais\posts\modal_criar.php'); ?>

    <!-- Bootstrap JS (optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

