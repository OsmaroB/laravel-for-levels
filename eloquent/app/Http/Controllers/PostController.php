<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
}
