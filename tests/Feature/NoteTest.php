<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Note;
use Tests\TestCase;

class NoteTest extends TestCase
{
    /** @test */
    public function fetch_all_notes()
    {
        $response = $this->get('/api/notes');

        $response->assertStatus(200);
    }
    /** @test */
    public function fetch_single_note()
    {
        $note = Note::factory()->create();

        $response = $this->get("/api/notes/{$note->id}");

        $response->assertStatus(200);
    }
    /** @test */
    public function create_a_note()
    {
        $noteData = [
            'title' => 'Test Note',
            'content' => 'This is a test note.'
        ];

        $response = $this->post('/api/notes', $noteData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('notes', $noteData);
    }
    /** @test */
    public function update_a_note()
    {
        $note = Note::factory()->create();

        $updateData = [
            'title' => 'Updated Title',
            'content' => 'Updated content.'
        ];

        $response = $this->put("/api/notes/{$note->id}", $updateData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('notes', $updateData);
    }
    /** @test */
    public function delete_a_note()
    {
        $note = Note::factory()->create();

        $response = $this->delete("/api/notes/{$note->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('notes', ['id' => $note->id]);
    }

}
