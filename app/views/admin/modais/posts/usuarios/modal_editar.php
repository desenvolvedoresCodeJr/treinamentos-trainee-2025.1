<div class="modal fade" id="editarModal-<?= $usuario->id ?>" tabindex="-1" aria-labelledby="editarModalLabel-<?= $post->id ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarModalLabel-<?= $post->id ?>">Editar o Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">



                            <form method="POST" action="/crudPosts/edit">
                                <input type="hidden" name="id" value="<?= $usuario->id ?>">
                                <div class="mb-3">
                                    <label for="Titulo-<?= $usuario->id ?>" class="form-label">Titulo</label>
                                    <input type="text" class="form-control" id="titulo-<?= $post->id ?>" name="titulo" value="<?= $post->titulo ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descricao-<?= $usuario->id ?>" class="form-label">Descricao</label>
                                    <input type="descricao" class="form-control" id="descricao-<?= $descricao->id ?>" name="descricao" value="<?= $post->descricao ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Imagem" class="form-label">Imagem</label>
                                    <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-warning">Salvar Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
