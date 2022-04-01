<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ], [
            'email.unique' => "This user with this email already exist " . $request -> input("email"),
            'username.unique' => "This user with this username already exist ". $request -> input("username")
        ]);

        $user = User::create([
            'name' => $input['name'],
            'username' => $input['username'],
            'password' => bcrypt($input['password']),
            'email' => $input['email']
        ]);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'username' => 'required|max:255|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return response()->json('Credentials not match', 401);
        }

        return response()->json([
            'user' => auth()->user(), // $request->user()
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}
