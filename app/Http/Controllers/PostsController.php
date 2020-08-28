<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{
    public function getPosts(){
        try {
            $request = Http::get('https://jsonplaceholder.typicode.com/posts');
            $posts = $request->json();
            return response(['posts' => $posts]);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to get the posts',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
