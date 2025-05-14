<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post->titulo) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .like-btn {
            position: absolute;
            top: 16px;
            right: 24px;
            font-size: 2rem;
            color: #dc3545;
            cursor: pointer;
            transition: color 0.2s;
            z-index: 10;
        }
        .like-btn.liked {
            color: #e0245e;
        }
        .like-count {
            font-size: 1rem;
            margin-left: 8px;
            color: #333;
        }
        .post-card-wrapper {
            position: relative;
        }
    </style>
</head>
<body>
    <?php require('app\views\admin\modais\header.php'); ?>
    <header class="bg-primary text-white py-4 mb-4">
        <div class="container">
            <h1 class="mb-0"><?= $post->titulo ?></h1>
        </div>
    </header>
    <div class="container">
        <div class="post-card-wrapper">
            <!-- Like button -->
            <span class="like-btn" id="likeBtn" title="Curtir">
                <i class="fa-regular fa-heart" id="likeIcon"></i>
                <span class="like-count" id="likeCount"><?= isset($post->likes) ? $post->likes : 0 ?></span>
            </span>
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
        </div>
        <section>
<script>
    // Simple like button toggle (no backend)
    document.addEventListener('DOMContentLoaded', function() {
        const likeBtn = document.getElementById('likeBtn');
        const likeIcon = document.getElementById('likeIcon');
        const likeCount = document.getElementById('likeCount');
        let liked = false;
        let count = parseInt(likeCount.textContent);

        likeBtn.addEventListener('click', function() {
            liked = !liked;
            if (liked) {
                likeIcon.classList.remove('fa-regular');
                likeIcon.classList.add('fa-solid');
                likeBtn.classList.add('liked');
                likeCount.textContent = count + 1;
            } else {
                likeIcon.classList.remove('fa-solid');
                likeIcon.classList.add('fa-regular');
                likeBtn.classList.remove('liked');
                likeCount.textContent = count;
            }
        });
    });
</script>
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
            <?php require('app\views\site\modais\modal_criar.php'); ?>
            

        </section>
    </div>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
