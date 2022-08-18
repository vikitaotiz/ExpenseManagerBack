<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Entry;
use App\Http\Resources\Entries\EntryResource;

class ReportsController extends Controller
{
    public function entries(Request $request)
    {
        if($request->from && $request->to){
            $data = Entry::whereBetween('created_at', [$request->from, $request->to])->get();
            return EntryResource::collection($data);
        }

    }
}
