@extends('layouts.dashboard')

@section('title', 'To-do')

@section('content')

@include('partials._navTodo')

    <h1>Add task</h1>
    <a href="{{  route('todo.index')  }}">Go to Dashboard</a>

    <form action="{{ route('todo.store') }}" method="post">
        @csrf
        
        <div>
            <input type="text" name="title" placeholder="title">
        </div>

        <div>
            <input type="text" name="description" placeholder="description">
        </div>

        <div>
            <input type="text" name="status" placeholder="status">
        </div>

        <input type="submit" placeholder="Add task">
    </form>
@endsection