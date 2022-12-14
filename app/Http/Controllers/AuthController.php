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
        $userExist = User::where('name', $request->name)
            ->where('phone', $request->phone)
            ->where('email', $request->email)
            ->where('country', $request->country)
            ->first();

        if($userExist) return response([
            'status' => 'error',
            'message' => 'User already exists, try a different one.'
        ]);

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

        if(!$user) return response([
            'status' => 'error',
            'message' => 'Registered failed.',
        ]);

        $token = $user->createToken('token')->plainTextToken;
        $user = new UserResource($user);

        $response = [
            'status' => 'success',
            'message' => 'User registered in successfully.',
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = null;
        if(Auth::attempt($request->only('phone', 'password'))) $user = Auth::user();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'status' => 'error',
                'message' => 'User does not exist, invalid credentials. Register'
            ], 401);
        }

        $token = $user->createToken('token')->plainTextToken;
        $user = new UserResource($user);

        $response = [
            'status' => 'success',
            'message' => 'User logged in successfully.',
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) 
    {
        auth()->user()->tokens()->delete();
        return [
            'status' => 'success',
            'message' => 'Logged out successfully.'
        ];
    }

    public function refresh(Request $request)
    {
        $user = auth()->user();

        if($user){
            $user->tokens()->delete();
            $token = $user->createToken('token')->plainTextToken;

            return response([
                'status' => 'success',
                'message' => 'Token refreshed successfully.',
                'user' => $user,
                'token' => $token
            ]);

        } else {
            return response([
                'status' => 'error',
                'message' => 'Token refresh failed. User not found'
            ]);
        }

    }
}