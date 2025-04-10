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

            </tbody>
        </table>
    </main>

            <!-- Modal Visualizar -->
            <div class="modal fade" id="visualizarModal-<?= $usuario->id ?>" tabindex="-1" aria-labelledby="visualizarModalLabel-<?= $usuario->id ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="visualizarModalLabel-<?= $usuario->id ?>">Detalhes do Usuário</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>ID:</strong> <?= $usuario->id ?></p>
                            <p><strong>Nome:</strong> <?= $usuario->nome ?></p>
                            <p><strong>Email:</strong> <?= $usuario->email ?></p>
                            <p><strong>Senha:</strong> <?= $usuario->senha ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Editar -->
            <div class="modal fade" id="editarModal-<?= $usuario->id ?>" tabindex="-1" aria-labelledby="editarModalLabel-<?= $usuario->id ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarModalLabel-<?= $usuario->id ?>">Editar Usuário</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?= $usuario->id ?>">
                                <div class="mb-3">
                                    <label for="nome-<?= $usuario->id ?>" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome-<?= $usuario->id ?>" name="nome" value="<?= $usuario->nome ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email-<?= $usuario->id ?>" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email-<?= $usuario->id ?>" name="email" value="<?= $usuario->email ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="senha-<?= $usuario->id ?>" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="senha-<?= $usuario->id ?>" name="senha" value="<?= $usuario->senha ?>" required>
                                </div>
                                <button type="submit" class="btn btn-warning">Salvar Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Deletar -->
            <div class="modal fade" id="deletarModal-<?= $usuario->id ?>" tabindex="-1" aria-labelledby="deletarModalLabel-<?= $usuario->id ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deletarModalLabel-<?= $usuario->id ?>">Confirmação de Exclusão</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja deletar o usuário <strong><?= $usuario->nome ?></strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?= $usuario->id ?>">
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="modal fade" id="criarmodal" tabindex="-1" aria-labelledby="criarmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="criarmodalLabel">Criar Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="senha" class="form-control" id="senha" name="senha" required>
                            </div>
                            <button type="submit" class="btn btn-success">Criar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Bootstrap JS (optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

