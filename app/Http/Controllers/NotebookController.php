<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;


class NotebookController extends Controller
{
    public function nbIndex(){
        $notes = Note::all();
        return view ('notebook.index', compact('notes'));
    }


    public function nbCreate(){
        return view('notebook.nb-create');
    }


    public function nbStore(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $newData = Note::create($data);
        return redirect(route('notebook.index'));
    }


    public function nbEdit(Note $note){
        return view('notebook.nb-edit', compact('note'));
    }


    public function nbUpdate(Note $note, Request $request){
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $note->update($data);

        return redirect( route('notebook.index'));
    }


    public function nbDelete(Note $note){
        $note->delete();
        return redirect (route('notebook.index', compact('note')));
    }

    
    public function nbShow(Note $note){
        $notes = Note::all();
        return view('notebook.index', compact('notes', 'note'));
    }
}
