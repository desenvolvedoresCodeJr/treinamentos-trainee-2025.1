<div class="modal-content" style="display: block; position: static; border: none; box-shadow: none;">
    <div class="modal-header">
        <h5 class="modal-title" id="visualizarComentarioModalLabel">Detalhes do Comentário</h5>
    </div>
    <div class="modal-body">
        <p><strong>ID:</strong> 123</p>
        <p><strong>Autor:</strong> Fulano</p>
        <p><strong>Comentário:</strong> Este é um comentário de exemplo.</p>
    </div>
    <div class="modal-footer">
        <form method="post" action="/postIndividual/delete">
            <input type="hidden" name="comentario_id" value="123">
            <button type="submit" class="btn btn-danger">Excluir Comentário</button>
        </form>
    </div>
</div>
