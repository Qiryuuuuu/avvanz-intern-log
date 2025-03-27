@extends('layouts.dashboard')

@section('title', 'Notebook - Add Notes')

@section('content')
@include('partials._navNotebook')

    <h1>Add notes</h1>
    <form action="{{ route('notebook.store') }}" method="post">
        @csrf
        <div>
            <input type="text" placeholder="Title" name="title">
        </div>
        <div>
            <input type="text" placeholder="Content" name="content">
        </div>
        <div>
            <input type="submit" value="Add notes">
        </div>
    </form>
@endsection