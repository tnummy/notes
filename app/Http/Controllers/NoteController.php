<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $title = $request->input('title');
        $body = $request->input('body');

        $data = [
            'user_id' => $userId,
            'title' => $title,
            'body'  => $body
            ];

        Note::create($data);

        $message = sprintf('Note "%s" was saved!', $title);

        $request->session()->flash('status', $message);

        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noteCollection = Note::where('id', $id)->firstorfail();

        $noteData = [
                'id' => $noteCollection->id,
                'title' => $noteCollection->title,
                'body' => $noteCollection->body,
            ];

        return view('notes/create', compact('noteData', 'noteData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');

        $note = Note::find($request->id);

        $note->title = $title;
        $note->body = $body;

        $note->save();

        $message = sprintf('Note "%s" was updated!', $title);

        $request->session()->flash('status', $message);

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $note = Note::find($request->id);

        $note->delete();

        $message = 'Note deleted!';

        $request->session()->flash('status', $message);

        return redirect('/home');
    }
}
