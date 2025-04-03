<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // Todo view - now shows only authenticated user's todos
    public function todo(){
        $pendingCount = auth()->user()->todos()->where('status', 'pending')->count();
        $doingCount = auth()->user()->todos()->where('status', 'doing')->count();
        $doneCount = auth()->user()->todos()->where('status', 'done')->count();

        $pendingTasks = auth()->user()->todos()->where('status', 'pending')->get();
        $doingTasks = auth()->user()->todos()->where('status', 'doing')->get();
        $doneTasks = auth()->user()->todos()->where('status', 'done')->get();

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

    // Create view (no changes needed)
    public function create(){
        return view('todo.create');
    }

    // Store method - now associates todo with authenticated user
    public function store(Request $request){
        // Validate the user input
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        // Create todo for the authenticated user
        $newTodo = auth()->user()->todos()->create($data);

        return redirect(route('todo.index'));
    }

    // Edit view - now checks if todo belongs to user
    public function edit(Todo $todo){
        // Verify the todo belongs to the authenticated user
        if($todo->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('todo.edit', ['todo' => $todo]);
    }

    // Update method - now checks if todo belongs to user
    public function update(Todo $todo, Request $request){
        // Verify the todo belongs to the authenticated user
        if($todo->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $todo->update($data);

        return redirect(route('todo.index'))->with('success', 'Task updated successfully');
    }

    // Delete method - now checks if todo belongs to user
    public function delete(Todo $todo){
        // Verify the todo belongs to the authenticated user
        if($todo->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $todo->delete();
        return redirect(route('todo.index'))->with('delete', 'Task deleted successfully');
    }

    // Change status - now checks if todo belongs to user
    public function updateStatus(Todo $todo, $status){
        // Verify the todo belongs to the authenticated user
        if($todo->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        //Validate the status value
        if(!in_array($status, ['pending', 'doing', 'done'])){
            return redirect(route('todo.index'))->with('error', "Status value is invalid");
        }

        //Update the todo status value
        $todo->status = $status;
        $todo->save();

        return redirect()->route('todo.index')->with('success', 'Task status updated to ' . $status);
    }
}