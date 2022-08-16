<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\Users\UserResource;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::where('id', '!=', 1)->orderBy('created_at', 'desc')->get(); 
        return UserResource::collection($data);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            "message" => "User deleted successfully."
        ]);
    }
}
