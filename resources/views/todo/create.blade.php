<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
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
</body>
</html>