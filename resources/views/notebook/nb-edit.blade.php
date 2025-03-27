@extends('layouts.dashboard')

@section('title', 'Notebook - Update Notes')

@section('content')
@include('partials._navNotebook')

    <h1>Edit notes</h1>
    <form action="{{ route('notebook.update', ['note' => $note]) }}" method="post">
        @csrf
        @method('put')
        <div>
            <input type="text" placeholder="Title" name="title" value="{{ $note->title }}">
        </div>
        <div>
            <input type="text" placeholder="Content" name="content" value="{{ $note->content }}">
        </div>
        <div>
            <input type="submit" value="Update notes">
            <a href="{{ route('notebook.index') }}">
                <button>Cancel</button>
            </a>
        </div>
    </form>
@endsection