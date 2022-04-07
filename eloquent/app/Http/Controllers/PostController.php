<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //
    public function index (){
        $posts = Post::all();

        foreach($posts as $post){
            echo "$post->id $post->title <br>";
        }
    }

    public function readSpecific(){
        $posts = Post::where('id', '>=', '20')
        ->orderBy('id', 'desc')
        ->get();

        foreach ($posts as  $post) {
            echo "$post->id $post->title <br>";
        }
    }

    public function posts(){
        $posts = Post::get();

        foreach($posts as $post){
            echo "
            $post->id
            <strong>{$post->user->get_name}</strong>
            $post->get_title
            <br>
            ";
        }
    }

    public function users(){
        $users = User::get();

        foreach($users as $user){
            echo "
            $user->id
            $user->name
            {$user->posts->count()} post
            <br>
            ";
        }
    }

    public function collections(){
        $users = User::get();
        // dd($users);
        // dd($users->contains(25));//La consulta contiene algun iten con el numero 25
        // dd($users->except([1,2,3,4,5,6,7,8,9,10]));//Todos excepto los que estan en el arreglo
        // dd($users->only([1,2,3]));//solamente los que contengan los elementos del array
        // dd($users->find(4));
        dd($users->load('posts'));
    }

    public function serialization(){
        $users = User::all();
        // dd($users->toArray());
        // $user = $users->find(1);
        // dd($user->toArray());
        dd($users->ToJson());
    }
}
