@extends('layouts.dashboard')

@section('title', 'Notebook')

@section('content')
@include('partials._navNotebook')

<div class="container-fluid mt-3">
    <div class="row">
        <!-- Notes Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Notes</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach ($notes as $n)
                            <li class="list-group-item list-group-item-action">
                                <a href="{{ route('notebook.show', $n->id) }}" class="text-decoration-none text-dark">
                                    {{ $n->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Note Content -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    @isset($note)
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h4 class="card-title mb-0">{{ $note->title }}</h4>
                            
                            <!-- Bootstrap Dropdown Menu -->
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" 
                                        id="noteActionsDropdown" data-bs-toggle="dropdown" 
                                        aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="noteActionsDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('notebook.edit', $note->id) }}">
                                            <i class="bi bi-pencil me-2"></i>Update
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('notebook.delete', $note->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-trash me-2"></i>Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-text">
                            <p>Date created: {{ $note->created_at }}</p> 
                            @if($note->created_at != $note->updated_at)
                                <p>Last updated: {{ $note->updated_at }}</p> 
                            @endif
                        </div>
                        
                        <div class="card-text mt-3">
                            {!! nl2br(e($note->content)) !!}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-journal-text display-4 text-muted"></i>
                            <p class="mt-3 text-muted">Select a note to view its details</p>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection