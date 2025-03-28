@extends('layouts.dashboard')

@section('title', 'To-do')

@section('content')

@include('partials._navTodo')

@php
    $taskStatuses = [
        'Pending' => $pendingTasks,
        'Doing' => $doingTasks,
        'Done' => $doneTasks,
    ]
@endphp

<div class="container-fluid my-4">
    <div class="row g-3">
        <div class="col-md-4 d-flex">
            <div class="card rounded-top-4 w-100">
                <div class="card-body text-center">
                  <h5 class="card-title">Pending: {{ $pendingCount }} <span class="fw-normal fs-6">{{ $pendingCount <= 1 ? 'task' : 'tasks' }}</span></h5>
                </div>
            </div>
        </div>

        <div class="col-md-4 d-flex">
            <div class="card rounded-top-4 w-100">
                <div class="card-body text-center">
                  <h5 class="card-title">Doing: {{ $doingCount }} <span class="fw-normal fs-6">{{ $doingCount <= 1 ? 'task' : 'tasks' }}</span></h5>
                </div>
            </div>
        </div>

        <div class="col-md-4 d-flex">
            <div class="card rounded-top-4 w-100">
                <div class="card-body text-center">
                  <h5 class="card-title">Done: {{ $doneCount }} <span class="fw-normal fs-6">{{ $doneCount <= 1 ? 'task' : 'tasks' }} </span></h5>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt-4">
    <div class="row">
        @foreach($taskStatuses as $status => $tasks)
        <div class="col-md-4 mb-4"> <!-- Using col-md-4 for 3 cards per row on medium screens -->
            <div class="card h-100 rounded-bottom-5"> <!-- Added h-100 for equal height cards -->
                <div class="card-body">
                    <h5 class="card-title my-3 text-center">{{ $status }}</h5>
                    
                    <div class="list-group">
                        @foreach ($tasks as $task)
                        <div class="list-group-item border-0 p-3 mb-2 bg-light rounded">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <strong class="d-block">{{ $task->title }}</strong>
                                    <small class="text-muted">{{ $task->description }}</small>
                                </div>
                                
                                <!-- Action button -->
                                <button class="btn btn-sm btn-outline-secondary action-btn" 
                                        onclick="toggleActions({{ $task->id }})">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                            </div>
                            
                            <!-- Hidden actions -->
                            <div class="action-options mt-2" id="actions-{{ $task->id }}" style="display: none;">
                                <div class="d-flex flex-wrap gap-2">
                                    <!-- Move button with dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" 
                                                onclick="toggleMenu({{ $task->id }})">
                                            Move
                                        </button>
                                        <div class="dropdown-menu" id="move-{{ $task->id }}">
                                            <a class="dropdown-item" href="{{ route('todo.status', ['todo' => $task, 'status' => 'Pending']) }}">Pending</a>
                                            <a class="dropdown-item" href="{{ route('todo.status', ['todo' => $task, 'status' => 'Doing']) }}">Doing</a>
                                            <a class="dropdown-item" href="{{ route('todo.status', ['todo' => $task, 'status' => 'Done']) }}">Done</a>
                                        </div>
                                    </div>
                                    
                                    <!-- Edit button -->
                                    <a href="{{ route('todo.edit', ['todo'=>$task]) }}" 
                                       class="btn btn-sm btn-outline-warning">
                                        Edit
                                    </a>
                                    
                                    <!-- Delete button -->
                                    <form class="d-inline" action="{{ route('todo.delete', ['todo'=>$task]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
