<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    public function getUsers(){
        try {
            $request = Http::get('https://jsonplaceholder.typicode.com/users');
            $users = $request->json();
            return response(['users' => $users]);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to get the users',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
