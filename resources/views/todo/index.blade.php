<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/js/todo.js')

</head>
<body>
    <h1>To-do</h1>

    <a href="{{ route('todo.create') }}">Add task</a>

    <div>
        <h1>Pending: {{$pendingCount}} task</h1>
        <h1>Doing {{$doingCount}} task</h1>
        <h1>Done {{$doneCount}} task</h1>
    </div>

    @php
        $taskStatuses = [
            'Pending' => $pendingTasks,
            'Doing' => $doingTasks,
            'Done' => $doneTasks,
        ]
    @endphp

    <div>
        @foreach($taskStatuses as $status => $tasks)
    
            <h1>{{ $status }}</h1>

            <ul>
                @foreach ($tasks as $task)
                <li>
                    <button>=</button>
                    <strong>{{ $task->title }}</strong><br>
                    {{ $task->description }}
                </li>

                @endforeach
            </ul>
        @endforeach
    </div>



    <div>
        <table border="1">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            @foreach ($todos as $todo)
                <tr>
                    <td>{{$todo->title}}</td>
                    <td>{{$todo->description}}</td>
                    <td>{{$todo->status}}</td>
                    
                    <td>
                        <a href="{{ route('todo.edit', ['todo' => $todo]) }}">Edit</a>
                    </td>

                    <td>
                        <form action="{{ route('todo.delete', ['todo'=>$todo]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
</body>
</html>