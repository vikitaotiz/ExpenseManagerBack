<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Entry;
use App\Models\IngredientProduct;
use App\Http\Resources\Products\ProductResource;
use Carbon\Carbon;

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
        if(!$request->name && !$request->selling_price) return response()->json([
            'status' => 'error',
            'message' => 'Name and selling price are required.'
        ]);

        $product = Product::where('name', $request->name)
            ->where('category_id', $request->category_id)
            ->where('company_id', $request->company_id)
            ->first();
        
        if($product) return response()->json([
            'status' => 'error',
            'message' => 'Product for this category already exists in this store'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'selling_price' => $request->selling_price,
            'company_id' => $request->company_id,
        ]);

        // if($product && count($request->ingredient_content) > 0){
        //     foreach($request->ingredient_content as $ingredient){
        //         IngredientProduct::create([
        //             'product_id' => $product->id,
        //             'ingredient_id' => $ingredient['id']
        //         ]);
        //     }
        // }

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully.'
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
                
        if(!$product) return response()->json([
            'status' => 'error',
            'message' => 'Product not found'
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'selling_price' => $request->selling_price,
            'company_id' => $request->company_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully.'
        ]);
    }

    public function product_closing_stock(Request $request)
    {
        $entry = Entry::whereDate('created_at', Carbon::yesterday())
            ->where('product_id', $request->product_id)
            ->first();
        
        if(!$entry) return response([
            "status" => "error",
            "message" => "Product has no closing stock for yesterday",
        ]);

        return response([
            "status" => "success",
            "message" => "Product has closing stock for yesterday",
            "today_opening_stock" => $entry->closing_stock
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
