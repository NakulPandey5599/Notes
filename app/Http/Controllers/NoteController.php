<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::latest()->paginate(9);

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
        ]);

        $data['user_id'] = auth()->user()->id;

        Note::create($data);

        return redirect()
        ->route('notes.index')
        ->with('success', 'Note created successfully!');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = Note::findOrFail($id);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note = Note::findOrFail($id);
        return view('notes.edit', compact('note'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $data = $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
        ]);

        Note::where('id', $id)->update($data);

        return redirect(route('notes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::where('id', $id)->delete();

        return redirect(route('notes.index'));
    }
}
