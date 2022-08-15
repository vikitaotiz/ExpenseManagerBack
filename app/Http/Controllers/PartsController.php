<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;
use App\Http\Resources\Parts\PartResource;

class PartsController extends Controller
{
    public function index()
    {
        return PartResource::collection(Part::orderBy('created_at', 'desc')->get());
    }
}
