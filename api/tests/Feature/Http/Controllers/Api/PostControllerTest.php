<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

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
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')->json('POST', '/api/posts',[
            'title' => 'El post de prueba'
        ]);

        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
            ->assertJson(['title' => 'El post de prueba'])
            ->assertStatus(201); //ok and create resourse

        $this->assertDatabaseHas('posts', ['title' => 'El post de prueba']);
    }

    public function test_validate_title(){

        // $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')->json('POST', '/api/posts',[
            'title' => ''
        ]);

        // Status HTT 422
        $response->assertStatus(422)
         ->assertJsonValidationErrors('title');
    }

    public function test_show(){
        // $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $post = Post::factory()->create();
        // create response in sentence json GET in route '/api/posts/{id}'
        $response = $this->actingAs($user, 'api')->json('GET', "/api/posts/$post->id");

        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
            ->assertJson(['title' => $post->title])
            ->assertStatus(200); //ok and create resourse
    }

    public function test_404_show(){
    
        // sirve para aclarar cuando recive un valor 404 cuando no existe una sentencia
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')->json('GET', '/api/posts/1000');

        $response->assertStatus(404);
    }

    public function test_update(){
        $this->withoutExceptionHandling();
        // creamos un post
        $user = User::factory()->create();
        $post = Post::factory()->create();

        // realizamos un PUT en post con el title nuevo
        $response = $this->actingAs($user, 'api')->json('PUT', "api/posts/$post->id", [
            'title' => 'nuevo'
        ]);

        // revisamos que recibimos de retorno la estructura con el titulo como nuevo con status 200
        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
            ->assertJson(['title' => 'nuevo'])
            ->assertStatus(200);
        // revisamos que en la base este guardado el post con el tutilo nuevo
        $this->assertDatabaseHas('posts', ['title' => 'nuevo']);
    }

    public function test_destroy(){
        $this->withoutExceptionHandling();
        // create post
        $user = User::factory()->create();
        $post = Post::factory()->create();
        // create sentence
        $response = $this->actingAs($user, 'api')->json('DELETE', "/api/posts/$post->id");
        // comprobe not see 
        $response->assertSee(null)
            ->assertStatus(204);

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    public function test_index(){
        $user = User::factory()->create();
        $post = Post::factory(5)->create();

        $response = $this->actingAs($user, 'api')->json('GET', '/api/posts');

        $response->assertJsonStructure([
            'data' =>[
                '*' => ['id', 'title', 'created_at', 'updated_at']
            ]
        ])->assertStatus(200);
    }

    public function test_guest(){
        $this->json('GET',    '/api/posts')->assertStatus(401);
        $this->json('GET',    '/api/posts/1000')->assertStatus(401);
        $this->json('PUT',    '/api/posts/1000')->assertStatus(401);
        $this->json('POST',   '/api/posts')->assertStatus(401);
        $this->json('DELETE', '/api/posts/1000')->assertStatus(401);
    }
}
