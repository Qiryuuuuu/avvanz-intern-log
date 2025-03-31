@extends('layouts.dashboard')

@section('title', 'Notebook - Add Notes')

@section('content')
@include('partials._navNotebook')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2 mb-0">Add Notes</h1>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('notebook.store') }}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" 
                                   placeholder="Enter note title" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control" 
                                      placeholder="Enter your note content" rows="10" 
                                      style="min-height: 200px;"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="fas fa-plus me-2"></i>Add Note
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection