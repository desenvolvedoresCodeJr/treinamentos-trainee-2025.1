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
