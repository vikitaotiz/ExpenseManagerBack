<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Resources\Tags\TagResource;

class TagsController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $tag = Tag::where(['name'=> $request->name])->first();
        
        if($tag) return response()->json([
            'status' => 'error',
            'message' => 'Tag already exists.',
        ]);

        Tag::create([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Tag created successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        
        if(!$tag) return response()->json([
            'status' => 'error',
            'message' => 'Tag does not exists.',
        ]);

        $tag->update([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Tag updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return response()->json([
            'message' => 'Tag deleted successfully.',
            'status' => 'success'
        ]);
    }
}
