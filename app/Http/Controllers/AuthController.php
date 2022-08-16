<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Users\UserResource;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|unique:users',
            'email' => 'required|string|unique:users,email',
            'country' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'phone' => $fields['phone'],
            'email' => $fields['email'],
            'country' => $fields['country'],
            'company_id' => 2,
            'role_id' => 2,
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('token')->plainTextToken;
        $user = new UserResource($user);

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'phone' => 'required|string',
            'country' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = null;
        if(Auth::attempt($request->only('phone', 'password'))) $user = Auth::user();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }

        $token = $user->createToken('token')->plainTextToken;
        $user = new UserResource($user);

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) 
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out successfully.'
        ];
    }
}