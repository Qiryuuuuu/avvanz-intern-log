<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // Todo view
    public function todo(){
        $pendingCount = todo::where('status' , 'pending')->count();
        $doingCount = todo::where('status' , 'doing')->count();
        $doneCount = todo::where('status' , 'done')->count();

        $pendingTasks = todo::where('status', 'pending')->get();
        $doingTasks = todo::where('status' , 'doing')->get();
        $doneTasks = todo::where('status' , 'done')->get();

        return view('todo.index', 
        [
            'pendingCount'=> $pendingCount,
            'doingCount'=> $doingCount,
            'doneCount' => $doneCount,

            'pendingTasks' => $pendingTasks,
            'doingTasks'=> $doingTasks,
            'doneTasks' => $doneTasks,
        ]);

    }

    // Create view
    public function create(){
        return view('todo.create');
    }

    // Store method
    public function store(Request $request){
        // Validate the user input
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

       $newTodo = Todo::create($data);

       return redirect(route('todo.index'));
    }

    // Edit view
    public function edit(Todo $todo){
        return view('todo.edit', ['todo' => $todo]);
    }

    // Update method
    public function update(Todo $todo, Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $todo->update($data);

        return redirect(route('todo.index'))->with('success', 'Task added successfully');
    }

    // Delete method
    public function delete(Todo $todo){
        $todo->delete();
        return redirect(route('todo.index'))->with('delete', 'Task deleted successfully');
    }

    // Change status
    public function updateStatus(Todo $todo, $status){
        //Validate the status value
        if(!in_array($status, ['Pending', 'Doing', 'Done'])){
            return redirect(route('todo.index'))->with('Invalid', "Status value is invalid");
        }

        //Update the todo status value
        $todo->status = $status;
        $todo->save();

        return redirect()->route('todo.index')->with('success', 'Task status updated to ' . $status);
    }
}
