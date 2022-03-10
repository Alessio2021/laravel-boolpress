<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::all();

        return response()->json([
            'response' => true,
            'results' => ['posts' => $posts],
        ]);
    }

    public function show($id) 
    {
        $post = Post::find($id);

        return response()->json([
            'response' => true,
            'results' => ['data' => $post],
        ]);
    }
}
