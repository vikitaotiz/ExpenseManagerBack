<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Role;
use App\Http\Resources\Users\UserResource;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::where('id', '!=', 1)->orderBy('created_at', 'desc')->get(); 
        return UserResource::collection($data);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if($user && $request->password){
            $company = Company::where("name", $request->company)->first();
            $role = Role::where("name", $request->role)->first();

            $user->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'country' => $request->country,
                'company_id' => $company->id,
                'role_id' => $role->id,
                'password' => bcrypt($request->password)
            ]);

            return response()->json([
                "status" => "success",
                "message" => "User updated successfully.",
            ]);

        } else {
            return response()->json([
                "status" => "error",
                "message" => "User not found."
            ]);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            "status" => "success",
            "message" => "User deleted successfully."
        ]);
    }
}
