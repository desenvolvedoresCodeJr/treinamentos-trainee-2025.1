<div class="modal fade" id="criarmodal" tabindex="-1" aria-labelledby="criarmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="criarmodalLabel">Criar Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/crudPosts/create" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="Titulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="Descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" required>
                            </div>
                                <div class="mb-3">
                                    <label for="imagem" class="form-label">Imagem</label>
                                    <input type="file" class="form-control" id="file" name="imagem" accept="image/*">
                                </div>
                            <button type="submit" class="btn btn-success">Criar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>