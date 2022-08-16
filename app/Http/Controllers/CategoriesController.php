<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\Products\CategoryProductResource;

class CategoriesController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::orderBy('created_at', 'desc')->get());
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if(!$category) return "Category not found...";
        return new CategoryProductResource($category);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:categories'
        ],[
            'unique' => 'This category already exists, try a different one.',
        ]);

        $category = Category::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return $category;
    }

    public function update(Request $request, Category $category)
    {
        // $category = 
        // $request->validate([
        //     'title' => 'required'
        // ]);

        // $update = $category->update([
        //     'title' => $request->title,
        //     'description' => $request->description
        // ]);

        return $request;
    }

    public function destroy($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $category->delete();

        return response()->json([
            "status" => "success",
            "message" => "Category deleted successfully."
        ]);
    }
}