<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    function auth(Request $request) {
        $request->validate([
            "email" => "required|email|exists:users,email",
            "password" => "required",
        ]);

        $user = User::whereEmail($request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'massage' => 'Wrong password'
            ]);

        }
        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
        return response()->json([
            'massage' => 'Login Success!',
            'access_token' => $token
        ]);
    }
    function register(Request $request) {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed",
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return response([
            'massage' => 'register successfully!'
        ], 201);
    }
}
