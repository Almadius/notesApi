<?php

namespace App\Services;

use App\Models\Note;

class NoteService
{
    public function getAll()
    {
        return Note::all();
    }

    public function getById($id)
    {
        return Note::findOrFail($id);
    }

    public function create($data)
    {
        return Note::create($data);
    }

    public function update(Note $note, $data)
    {
        $note->update($data);
        return $note;
    }

    public function delete(Note $note)
    {
        $note->delete();
        return $note;
    }
}

