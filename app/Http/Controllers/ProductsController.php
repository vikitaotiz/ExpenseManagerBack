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
        if(!$request->name && !$request->unit_id && !$request->store_id) return response()->json([
            'status' => 'error',
            'message' => 'Name, unit and store are required.'
        ]);

        $product = Product::where('name', $request->name)
            ->where('category_id', $request->category_id)
            ->where('company_id', $request->company_id)
            ->where('store_id', $request->store_id)
            ->first();
        
        if($product) return response()->json([
            'status' => 'error',
            'message' => 'Product for this category already exists in this store'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'company_id' => $request->company_id,
            'store_id' => $request->store_id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully.'
        ]);
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
