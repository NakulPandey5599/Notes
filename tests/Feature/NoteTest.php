<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_note()
    {   $this->withoutMiddleware();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('notes.store'), [
            'title' => 'Test Note',
            'content' => 'This is a test note.',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('notes.index'));

        $this->assertDatabaseHas('notes', [
            'title' => 'Test Note',
            'content' => 'This is a test note.',
            'user_id' => $user->id,
        ]);
    }
}    