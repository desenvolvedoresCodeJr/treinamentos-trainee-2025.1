    <div class="d-flex justify-content-center mt-4<?= $total_pages <= 1 ? " d-none" : "" ?>">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item<?= $page <= 1 ? " disabled" : "" ?>">
                    <a class="page-link" href="?paginacaoNumero=<?= $page - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
                    <li class="page-item<?= $page_number == $page ? " active" : "" ?>">
                        <a class="page-link" href="?paginacaoNumero=<?= $page_number ?>"><?= $page_number ?></a>
                    </li>
                <?php endfor ?>
                <li class="page-item<?= $page >= $total_pages ? " disabled" : "" ?>">
                    <a class="page-link" href="?paginacaoNumero=<?= $page + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>