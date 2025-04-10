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
