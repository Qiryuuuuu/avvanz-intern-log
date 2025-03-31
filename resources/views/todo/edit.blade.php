@extends('layouts.dashboard')

@section('title', 'To-do')

@section('content')
@include('partials._navTodo')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2 mb-0">Edit Task</h1>
                <a href="{{ route('todo.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('todo.update', ['todo' => $todo]) }}" method="post">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" 
                                   placeholder="Enter task title" value="{{ $todo->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" 
                                      placeholder="Enter task description" rows="3">{{ $todo->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="pending" {{ $todo->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ $todo->status == 'doing' ? 'selected' : '' }}>Doing</option>
                                <option value="completed" {{ $todo->status == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="fas fa-save me-2"></i>Update Task
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection