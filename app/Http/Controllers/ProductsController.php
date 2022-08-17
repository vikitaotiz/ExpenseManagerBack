<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Resources\Products\ProductResource;

class ProductsController extends Controller
{
    public function index()
    {
        if(auth()->user()->id === 1 && auth()->user()->role_id === 1){
            $data = Product::orderBy('created_at', 'desc')->get();
        } else {
            $data = Product::where('company_id', auth()->user()->company_id)
                    ->orderBy('created_at', 'desc')->get();
        }
        return ProductResource::collection($data);
    }

    public function store(Request $request)
    {
        $category = Category::where('slug', $request->slug)->first();
        if($category){        
            $request->validate([
                'name' => 'required|unique:products'
            ]);

            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $category->id,
                'unit_id' => $request->unit_id,
                'company_id' => $request->company_id
            ]);

            return $product;
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            "status" => "success",
            "message" => "Product deleted successfully."
        ]);
    }
}
