<nav class="navbar navbar-light bg-light p-3 rounded-3 shadow-sm"> 
    <div class="container-fluid"> 
        <div class="d-flex align-items-center"> 
            <i class="fs-2 bi bi-clock-fill me-2"></i>
            <h1 class="m-0">Daily Time Record</h1>
        </div>
        
        <div class="ms-auto"> 
            @if(!$activeTime)
                <form action="{{ route('dtr.timeIn') }}" method="post">
                    @csrf
                    <button type="submit" class="btn text-decoration-none px-4 py-3 rounded-4 d-flex align-items-center gap-2  btn-add-task"
                        style="background-color: #2A4B7C; color: white;">

                        <i class="fs-4 bi bi-clock-fill me-1" style="color: #E6A71F;"></i>
                        
                        <span class="d-none d-sm-inline">Time in</span>
                    </button>
                </form>
            @else
                <form action="{{ route('dtr.timeOut', $activeTime -> id) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn text-decoration-none px-4 py-3 rounded-4 d-flex align-items-center gap-2  btn-add-task"
                        style="background-color: #E6A71F; color: #2A4B7C;">

                        <i class="fs-4 bi bi-clock-fill me-1" style="color:  #2A4B7C;"></i>
                        
                        <span class="d-none d-sm-inline">Time out</span>
                    </button>
                </form>
            @endif
        </div>
    </div>
</nav>