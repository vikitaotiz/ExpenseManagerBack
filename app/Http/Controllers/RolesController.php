<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Resources\Roles\RoleResource;

class RolesController extends Controller
{
    public function index()
    {
        return RoleResource::collection(Role::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $role = Role::where(['name'=> $request->name])->first();
        
        if($role) return response()->json([
            'status' => 'error',
            'message' => 'Role already exists.',
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Role created successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        
        if(!$role) return response()->json([
            'status' => 'error',
            'message' => 'Role does not exists.',
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Role updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json([
            'message' => 'Role deleted successfully.',
            'status' => 'success'
        ]);
    }
}
