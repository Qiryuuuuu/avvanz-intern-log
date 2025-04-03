<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Avvanz Inc.</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fs-4 bi-speedometer2 align-middle"></i> <span class="ms-1 d-none d-sm-inline align-middle">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('todo.index') }}" class="nav-link align-middle px-0 {{ request()->routeIs('todo.index') ? 'active' : '' }}">
                    <i class="fs-4 bi-list-task align-middle"></i> <span class="ms-1 d-none d-sm-inline align-middle">Todo</span>
                </a>
            </li>
            <li>
                <a href="{{ route('notebook.index') }}" class="nav-link px-0 align-middle {{ request()->routeIs('notebook.index') ? 'active' : '' }}">
                    <i class="fs-4 bi bi-book-half align-middle"></i> <span class="ms-1 d-none d-sm-inline align-middle">Notebook</span></a>
            </li>
            <li>
                <a href="{{ route('dtr.index') }}" class="nav-link px-0 align-middle {{ request()->routeIs('dtr.index') ? 'active' : '' }}">
                    <i class="fs-4 bi-clock-fill align-middle"></i> <span class="ms-1 d-none d-sm-inline align-middle">Daily Time Record</span> </a>
            </li>
        </ul>
        <hr>
        @auth
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        Profile
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            Sign out
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</div>