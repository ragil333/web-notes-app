<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $response = $this->GetRequst($this->uri . 'notes');
        $data = $response['data'];
        return view('pages.notes.index')->with('data', $data);
    }
    public function addNote(Request $request)
    {
        return view('pages.notes.add');
    }

    public function storeNote(Request $request)
    {
        $response = $this->PostRequest($this->uri . 'notes', $request->all());
        if ($response->status() == 422) {
            return back()->withErrors($response['errors'])->withInput();
        }
        return redirect()->route('home')->with('success', 'note saved');
    }

    public function updateNote(Request $request, $id)
    {
        $response = $this->PutRequest($this->uri . 'notes/' . $id, $request->all());
        if ($response->status() == 422) {
            return back()->withErrors($response['errors'])->withInput();
        }
        return redirect()->route('home')->with('success', 'note update');
    }
    public function noteById($id)
    {
        $response = $this->GetRequst($this->uri . 'notes/' . $id);
        return view('pages.notes.update')->with('data', $response['data']);
    }
    public function deleteNote($id)
    {
        $response = $this->DeleteRequest($this->uri . 'notes/' . $id);
        return redirect()->route('home')->with('success', 'note deleted');
    }
}
