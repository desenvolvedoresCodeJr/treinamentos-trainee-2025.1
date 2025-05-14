<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post->titulo) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require('app\views\admin\modais\header.php'); ?>
    <header class="bg-primary text-white py-4 mb-4">
        <div class="container">
            <h1 class="mb-0"><?= $post->titulo ?></h1>
        </div>
    </header>
    <div class="container">
        <div class="card mb-4">
            <div class="row g-0 align-items-center">
                <?php if (!empty($post->imagem)): ?>
                <div class="col-md-4 text-center">
                    <img src="/<?= htmlspecialchars($post->imagem) ?>" alt="Imagem do Post" style="max-width: 100%; height: auto; display: block;">
                </div>
                <?php endif; ?>
                <div class="<?= !empty($post->imagem) ? 'col-md-8' : 'col-12' ?>">
                    <div class="card-body">
                        <h2 class="card-title"><?= $post->titulo ?></h2>
                        <p class="card-text"><?= nl2br($post->descricao) ?></p>
                        
                        <?php $usuario = App\Core\App::get('database')->selectAll('usuarios', ['id' => $post->id_autor])[0]; ?>
                        
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <span class="text-muted">Autor: <?= $usuario->nome ?></span>
                            <span class="text-muted"><?= date('d/m/Y', strtotime($post->criado_em)) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <h3>Comentários</h3>
            <!-- Lista de comentários -->
            <?php if (!empty($comentarios)): ?>
                <?php foreach ($comentarios as $comentario): ?>
                    <?php require('app\views\site\modais\modal_visualizar.php'); ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Seja o primeiro a comentar!</p>
            <?php endif; ?>
            <!-- Espaço extra antes do formulário -->
            <div class="my-4"></div>
            <h4>Faça seu comentário!</h4>
            <!-- Formulário para novo comentário -->
            <form method="post" action="">
                <div class="mb-3">
                    <label for="comment_author" class="form-label">Seu nome</label>
                    <input type="text" class="form-control" id="comment_author" name="comment_author" required>
                </div>
                <div class="mb-3">
                    <label for="comment_content" class="form-label">Comentário</label>
                    <textarea class="form-control" id="comment_content" name="comment_content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Comentário</button>
            </form>
        </section>
    </div>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
