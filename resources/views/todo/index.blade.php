@extends('layouts.todo')

@section('title', 'To-do')

@section('content')


<nav class="navbar navbar-light bg-light p-3 rounded-3 shadow-sm"> 
    <div class="container-fluid"> 
      <div class="d-flex align-items-center"> 
        <i class="fs-2 bi bi-list-task me-2"></i>
        <h1 class="m-0">To-do</h1>
      </div>
      
      <div class="ms-auto"> 
        <a href="{{ route('todo.create') }}" 
           class="btn text-decoration-none px-4 py-3 rounded-4 d-flex align-items-center gap-2"
           style="background-color: #2A4B7C; color: white;">
          <i class="bi bi-plus-circle-fill me-1" style="color: #E6A71F;"></i>
          <span class="d-none d-sm-inline">Add Task</span>
        </a>
      </div>
    </div>
  </nav>


@php
    $taskStatuses = [
        'Pending' => $pendingTasks,
        'Doing' => $doingTasks,
        'Done' => $doneTasks,
    ]
@endphp

<div class="container-fluid my-4">
    <div class="row gy-3">
        <div class="col d-flex justify-content-center">
            <div class="card rounded-4" style="width: 35rem;">
                <div class="card-body text-center">
                  <h5 class="card-title">Pending: {{ $pendingCount }} <span class="fw-normal fs-6">{{ $pendingCount <= 1 ? 'task' : 'tasks' }}</span></h5>
                </div>
              </div>
        </div>

        <div class="col d-flex justify-content-center">
            <div class="card rounded-4" style="width: 35rem;">
                <div class="card-body text-center">
                  <h5 class="card-title">Doing: {{ $doingCount }} <span class="fw-normal fs-6">{{ $doingCount <= 1 ? 'task' : 'tasks' }}</span></h5>
                </div>
              </div>
        </div>

        <div class="col d-flex justify-content-center">
            <div class="card rounded-4" style="width: 35rem;">
                <div class="card-body text-center">
                  <h5 class="card-title">Done: {{ $doneCount }} <span class="fw-normal fs-6">{{ $doneCount <= 1 ? 'task' : 'tasks' }} </span></h5>
                </div>
              </div>
        </div>
    </div>
</div>


<div>
    @foreach($taskStatuses as $status => $tasks)

        <h1>{{ $status }}</h1>

        <ul>
            @foreach ($tasks as $task)
                <li class="list-unstyled">
                    <!-- Calls the toggleActions and pass the corresponding task using $task->id  -->
                    <button class="action-btn" onclick="toggleActions({{ $task->id }})">=</button>

                    <strong>{{ $task->title }}</strong><br>
                    {{ $task->description }}

                <!-- Hidden actions -->
                <div class="action-options"  id="actions-{{ $task->id }}" style="display: none; margin-top: 5px;">
                    <div>
                        <a>
                            <button onclick="toggleMenu({{ $task->id }})">Move</button>    
                        </a>
                    </div>

                    <div class="move-options" id="move-{{ $task->id }}" style="display: none; margin-top: 5px;">
                        <a href="{{ route('todo.status', ['todo' => $task, 'status' => 'Pending']) }}">
                            <button >Pending</button>
                        </a>

                        <a href="{{ route('todo.status', ['todo' => $task, 'status' => 'Doing']) }}">
                            <button>Doing</button>
                        </a>
                        
                        <a href="{{ route('todo.status', ['todo' => $task, 'status' => 'Done']) }}">
                            <button>Done</button>
                        </a>
                    </div>

                    <div>
                        <a href="{{ route('todo.edit', ['todo'=>$task]) }}">
                            <button>Edit</button>    
                        </a>
                    </div>
                    
                    <form action="{{ route('todo.delete', ['todo'=>$task]) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit">Delete</button>
                    </form>
                </div>
                </li>
            @endforeach
        </ul>
    @endforeach
</div>
@endsection
