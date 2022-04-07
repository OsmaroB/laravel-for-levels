<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    // use DatabaseMigrations;

    public function test_store()
    {
        // $this->withoutExceptionHandling();
        $response = $this->json('POST', '/api/posts',[
            'title' => 'El post de prueba'
        ]);

        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
            ->assertJson(['title' => 'El post de prueba'])
            ->assertStatus(201); //ok and create resourse

        $this->assertDatabaseHas('posts', ['title' => 'El post de prueba']);
    }

    public function test_validate_title(){
        $response = $this->json('POST', '/api/posts',[
            'title' => ''
        ]);

        // Status HTT 422
        $response->assertStatus(422)
         ->assertJsonValidationErrors('title');
    }
}
