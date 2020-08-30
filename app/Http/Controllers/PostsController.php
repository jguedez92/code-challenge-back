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

    public function insertPost(Request $request){
        try {
            $post = $request->validate([
                'title' => 'required|string|max:40',
                'body' => 'required|string',
                'email' => 'required|string',
                'userId' => 'required|numeric',
            ]);
            $request = Http::withHeaders([
                "Content-type" => "application/json; charset=UTF-8"
                ])->post('https://jsonplaceholder.typicode.com/posts', $post );
            return response(['messaje' => 'post inserted successfully']);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to get the posts',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
