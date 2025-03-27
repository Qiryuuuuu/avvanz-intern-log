<nav class="navbar navbar-light bg-light p-3 rounded-3 shadow-sm"> 
    <div class="container-fluid"> 
        <div class="d-flex align-items-center"> 
        <i class="fs-2 bi bi-book-half me-2"></i>
        <h1 class="m-0">Notebook</h1>
        </div>
        
        <div class="ms-auto"> 
        <a href="{{ route('notebook.create') }}" 
            class="btn text-decoration-none px-4 py-3 rounded-4 d-flex align-items-center gap-2  btn-add-task"
            style="background-color: #2A4B7C; color: white;">
            <i class="fs-4 bi bi-plus-circle-fill me-1" style="color: #E6A71F;"></i>
            <span class="d-none d-sm-inline">Add Notes</span>
        </a>
        </div>
    </div>
</nav>