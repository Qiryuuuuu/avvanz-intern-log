@extends('layouts.dashboard')

@section('title', 'To-do')

@section('content')

@include('partials._navTodo')

    <h1>Edit task</h1>
    <a href="{{  route('todo.index')  }}">Go to Dashboard</a>

    <form action="{{ route('todo.update', ['todo' => $todo]) }}" method="post">
        @csrf
        @method('Put')
        <div>
            <input type="text" name="title" placeholder="title" value="{{ $todo->title }}">
        </div>

        <div>
            <input type="text" name="description" placeholder="description" value="{{ $todo->description }}">
        </div>

        <div>
            <input type="text" name="status" placeholder="status"  value="{{ $todo->status }}">
        </div>

        <input type="submit" placeholder="Add task">
    </form>

@endsection