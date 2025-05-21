<div class="modal fade" id="editarModal-<?= $post->id ?>" tabindex="-1" aria-labelledby="editarModalLabel-<?= $post->id ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel-<?= $post->id ?>">Editar o Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/crudPosts/edit" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                    <input type="hidden" name="id_autor" value="1"> <!-- Adicionando id_autor -->

                    <div class="mb-3">
                        <label for="Titulo-<?= $post->id ?>" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo-<?= $post->id ?>" name="titulo" value="<?= $post->titulo ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="descricao-<?= $post->id ?>" class="form-label">Descricao</label>
                        <input type="text" class="form-control" id="descricao-<?= $post->id ?>" name="descricao" value="<?= $post->descricao ?>" required>
                    </div>

                    <input type="hidden" name="criado_em" value="<?= $post->criado_em ?>">

                    <div class="mb-3">
                        <label for="Imagem" class="form-label">Imagem</label>
                        <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">

                        <!-- Optional: Display current image -->
                        <?php if (isset($post->imagem) && file_exists($post->imagem)): ?>
                            <div class="mt-2">
                                <p><strong>Imagem Atual:</strong></p>
                                <img src="<?= $post->imagem ?>" alt="Imagem atual" style="max-width: 200px; height: auto;">
                            </div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-warning">Salvar Alterações</button>
                </form>
            </div>
        </div>
    </div>
</div>
