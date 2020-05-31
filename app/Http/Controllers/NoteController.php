<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {}

    public function show_all()
    {
        return response()->json(Note::all());
    }

    public function by_id($id)
    {
        return response()->json(Note::find($id));
    }

    public function by_active()
    {
        return response()->json(Note::get_active());
    }

    public function by_deactive()
    {
        return response()->json(Note::get_deactive());
    }

    public function create(Request $request)
    {
        $this->validate($request,   [
                                        'title' => 'required',
                                        'note' => 'required'
                                    ]);

        $note = Note::create($request->all());
        return response()->json($note, 201);
    }

    public function close($id)
    {
        $note = Note::findOrFail($id);

        $note->note_close();
        return response('[id:'.$id.'] Closed successfully', 200);
    }

    public function restore($id)
    {
        $note = Note::findOrFail($id);

        $note->note_restore();
        return response('[id:'.$id.'] Restored successfully', 200);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,   [
                                        'title' => 'required'
                                    ]);

        $note = Note::findOrFail($id);

        $note->update($request->all());
        return response()->json($note, 200);
    }

    public function delete($id)
    {
        $note = Note::findOrFail($id);

        $note->delete();
        return response('[id:'.$id.'] Deleted successfully', 200);
    }
}
