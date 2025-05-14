
            <form method="post" action="/postIndividual/<?= $post->id ?>/create">
                <input type="hidden" name="id_post" value="<?= $post->id ?>">
                <input type="hidden" name="criado_em" value="<?= date('Y-m-d H:i:s') ?>">
                <input type="hidden" name="id_autor" value="0">
                <div class="mb-3">
                    <label for="id_autor" class="form-label">Seu nome</label>
                    <input type="text" class="form-control" id="id_autor" name="id_autor" required>
                </div>
                <div class="mb-3">
                    <label for="texto" class="form-label">Comentário</label>
                    <textarea class="form-control" id="texto" name="texto" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Comentário</button>
            </form>