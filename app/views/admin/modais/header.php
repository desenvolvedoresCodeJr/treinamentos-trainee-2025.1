    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
        <div class="container justify-content-center">
            <div class="d-flex flex-row align-items-center w-100 gap-2 justify-content-between">
                <a class="btn btn-warning flex-fill mx-2" href="/crudPosts">
                    <i class="bi bi-file-earmark-text me-1"></i>
                    CRUD Postagens
                </a>
                <a class="btn btn-info flex-fill mx-2" href="/crudUsuarios">
                    <i class="bi bi-people me-1"></i>
                    CRUD Usuários
                </a>
                <form action="/logout" method="POST" class="flex-fill mx-2" style="display:inline;">
                    <button type="submit" class="btn btn-success w-100 action-btn logout">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>