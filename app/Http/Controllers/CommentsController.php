<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function getComments(){
        try {
            $request = Http::get('https://jsonplaceholder.typicode.com/comments');
            $comments = $request->json();
            return response(['comments' => $comments]);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to get the comments',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
