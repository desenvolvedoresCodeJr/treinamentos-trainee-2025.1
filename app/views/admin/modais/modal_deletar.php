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
                            <form method="POST" action="/crudUsuarios/delete">
                                <input type="hidden" name="id" value="<?= $usuario->id ?>">
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
