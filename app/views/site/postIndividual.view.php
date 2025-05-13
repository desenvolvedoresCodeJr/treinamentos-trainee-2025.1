<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white py-4 mb-4">
        <div class="container">
            <h1 class="mb-0"><?= htmlspecialchars($title) ?></h1>
        </div>
    </header>
    <div class="container">
        <div class="card mb-4">
            <?php if (!empty($image)): ?>
                <img src="<?= htmlspecialchars($image) ?>" class="card-img-top" alt="Imagem do post">
            <?php endif; ?>
            <div class="card-body">
                <h2 class="card-title"><?= htmlspecialchars($title) ?></h2>
                <p class="card-text"><?= nl2br(htmlspecialchars($description)) ?></p>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <span class="text-muted">Autor: <?= htmlspecialchars($author) ?></span>
                    <span class="text-muted"><?= date('d/m/Y', strtotime($post_date)) ?></span>
                </div>
            </div>
        </div>
        <section>
            <h3>Comentários</h3>
            <!-- Lista de comentários -->
            <?php if (!empty($comments)): ?>
                <ul class="list-group mb-4">
                    <?php foreach ($comments as $comment): ?>
                        <li class="list-group-item">
                            <strong><?= htmlspecialchars($comment['author']) ?>:</strong>
                            <span><?= nl2br(htmlspecialchars($comment['content'])) ?></span>
                            <div class="text-muted small"><?= date('d/m/Y H:i', strtotime($comment['date'])) ?></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Seja o primeiro a comentar!</p>
            <?php endif; ?>
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
