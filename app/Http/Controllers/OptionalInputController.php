<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OptionalInput;
use App\Http\Resources\Companies\OptionalInputResource;

class OptionalInputController extends Controller
{
    public function index()
    {
        return OptionalInputResource::collection(OptionalInput::all());
    }
}
