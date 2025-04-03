<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NotebookController extends Controller
{
    public function nbIndex()
    {
        $notes = auth()->user()->notes()->latest()->get();
        return view('notebook.index', compact('notes'));
    }

    public function nbCreate()
    {
        return view('notebook.nb-create');
    }

    public function nbStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        auth()->user()->notes()->create($data);
        return redirect(route('notebook.index'));
    }

    public function nbEdit(Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('notebook.nb-edit', compact('note'));
    }

    public function nbUpdate(Note $note, Request $request)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $note->update($data);
        return redirect(route('notebook.index'));
    }

    public function nbDelete(Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $note->delete();
        return redirect(route('notebook.index'));
    }

    public function nbShow(Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('notebook.index', [
            'notes' => auth()->user()->notes()->latest()->get(),
            'note' => $note
        ]);
    }
}