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
}
