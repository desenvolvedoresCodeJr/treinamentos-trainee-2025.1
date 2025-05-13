<div class="modal fade" id="criarmodal" tabindex="-1" aria-labelledby="criarmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="criarmodalLabel">Adicionar Comentário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/postIndividual/create">
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" required>
                    </div>
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentário</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Comentar</button>
                </form>
            </div>
        </div>
    </div>
</div>
