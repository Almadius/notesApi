<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use App\Services\NoteService;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    protected NoteService $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function index()
    {
        return $this->noteService->getAll();
    }

    public function show($id)
    {
        return $this->noteService->getById($id);
    }

    public function store(NoteRequest $request)
    {
        return $this->noteService->create($request->validated());
    }

    public function update(NoteRequest $request, $id)
    {
        $note = $this->noteService->getById($id);
        return $this->noteService->update($note, $request->validated());
    }

    public function destroy($id)
    {
        $note = $this->noteService->getById($id);
        return $this->noteService->delete($note);
    }
}

