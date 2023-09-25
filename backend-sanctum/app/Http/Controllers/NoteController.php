<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\NoteModel;

class NoteController extends Controller
{
    private $_model;

    function __construct(NoteModel $model)
    {
        $this->_model = $model;
    }
    public function index()
    {
        $user = auth()->user()->load('role');
        if ($user->role->kode_role == 1) {
            $data = $this->_model->with('user')->get();
        } else {
            $data = $this->_model->where('id_user', $user->id)->get();
        }
        return $this->FetchData($data);
    }
    public function show($id)
    {
        $data = $this->_model->whereId($id)->first();
        return $this->FetchData($data);
    }
    public function store(StoreNoteRequest $request)
    {
        $data = $this->_model->create($request->validated());
        return $this->UpdateData($data);
    }
    public function update(UpdateNoteRequest $request, $id)
    {
        $data = $this->_model->whereId($id)->first();
        $data->update($request->validated());
        return $this->UpdateData($data);
    }
    public function destroy($id)
    {
        $data = $this->_model->whereId($id)->first();
        $data->delete();
        return $this->DeleteData();
    }
}
