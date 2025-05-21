<tr>
    <td><?= $post->id ?></td>
    <td><?= $post->titulo ?></td>
    <td><?= $usuario->nome ?></td>
    <td>
        <a href="/postIndividual/<?= $post->id ?>" class="btn btn-primary">
            Página
        </a>
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#visualizarModal-<?= $post->id ?>">
            Visualizar
        </button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal-<?= $post->id ?>">
            Editar
        </button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletarModal-<?= $post->id ?>">
            Deletar
        </button>
        <span class="badge bg-success ms-2">
            <?= $post->like_counter ?> 👍
        </span>
    </td>
</tr>