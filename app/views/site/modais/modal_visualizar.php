<div class="modal-content" style="border: 2px solid #dee2e6; border-radius: 12px; padding-bottom: 24px; padding-right: 24px;">
    <div class="modal-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><strong>Autor:</strong> <?= $usuario->nome ?></span>
                <span> <?= date('d/m/Y', strtotime($comentario->criado_em)) ?></span>
            </li>
            <li class="list-group-item">
                <strong>Texto:</strong> <?= nl2br($comentario->texto) ?>
            </li>
        </ul>
    </div>
    <div class="modal-footer">
        <form method="post" action="/postIndividual/delete" class="ms-auto">
            <input type="hidden" name="comentario_id" value="<?= $comentario->id ?>">
            <button type="submit" class="btn btn-outline-danger">
                <i class="bi bi-trash"></i> Excluir
            </button>
        </form>
    </div>
</div>
