        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Avvanz Inc.</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('todo.index') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-list-task align-middle"></i> <span class="ms-1 d-none d-sm-inline align-middle">Todo</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('notebook.index') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-book-half align-middle"></i> <span class="ms-1 d-none d-sm-inline align-middle">Notebook</span></a>
                    </li>
                    <li>
                        <a href="{{ route('dtr.index') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-clock-fill align-middle"></i> <span class="ms-1 d-none d-sm-inline align-middle">Daily Time Record</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Avvanzer</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>