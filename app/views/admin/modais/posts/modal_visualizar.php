<div class="modal fade" id="visualizarModal-<?= $post->id ?>" tabindex="-1" aria-labelledby="visualizarModalLabel-<?= $post->id ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="visualizarModalLabel-<?= $post->id ?>">Detalhes do Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>ID:</strong> <?= $post->id ?></p>
                            <p><strong>Titulo:</strong> <?= $post->titulo ?></p>
                            <p><strong>Descricao:</strong> <?= $post->descricao ?></p>
                            <p><strong>Imagem:</strong> <?= $post->imagem ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
