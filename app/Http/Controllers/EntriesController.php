<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Company;
use App\Http\Resources\Entries\EntryResource;
use App\Http\Resources\Companies\CompanyResource;
use Carbon\Carbon;

class EntriesController extends Controller
{
    public function index()
    {
        if(auth()->user()->id === 1 && auth()->user()->role_id === 1){
            $data = Entry::orderBy('created_at', 'desc')->get();
        } else {
            $data = Entry::where('company_id', auth()->user()->company_id)->orderBy('created_at', 'desc')->get();
        }
        
        return EntryResource::collection($data);
    }

    public function today_entries()
    {
        if(auth()->user()->id === 1 && auth()->user()->role_id === 1){
            $entries = Entry::whereDate('created_at', Carbon::today())
                        ->orderBy('created_at', 'desc')->get();
        } else {
            $entries = Entry::where('company_id', auth()->user()->company_id)
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at', 'desc')->get(); 
        }

        return EntryResource::collection($entries);
    }

    public function show($slug)
    {
           $company = Company::where('slug', $slug)->first();
           if(!$company) return "Company not found...";
           return new CompanyResource($company);
    }

    // function group_array($property, $data) {
    //     $grouped_array = array();
    
    //     foreach($data as $value) {
    //         if(array_key_exists($property, $value)){
    //             $grouped_array[$value[$property]][] = $value;
    //         }else{
    //             $grouped_array[""][] = $value;
    //         }
    //     }
    
    //     return $grouped_array;
    // }

    public function store(Request $request)
    {
        $reord = Entry::whereDate('created_at', Carbon::today())
                        ->where('product_id', '=', $request->product_id)->first();
        
        if($reord){
            return response()->json([
                'message' => 'Entry already made today.',
                'status' => 'error'
            ]);
        } else {
            $request->validate([
                "product_id" => "required",
                "unit_price" => "required",
                "purchases" => "required",
                "opening_stock" => "required",
                "closing_stock" => "required",
            ]);

            $entry = Entry::create([
                "product_id" => $request->product_id,
                "unit_price" => $request->unit_price,
                "units" => $request->units,
                "parts" => $request->parts,
                "purchases" => $request->purchases,
                "purchases_cost" => $request->purchases_cost,
                "opening_stock" => $request->opening_stock,
                "closing_stock" => $request->closing_stock,
                "closing_stock_cost" => $request->closing_stock_cost,
                "usage" => $request->usage,
                "usage_cost" => $request->usage_cost,
                "system_usage" => $request->system_usage,
                "stock_shortage" => $request->stock_shortage,
                "stock_shortage_cost" => $request->stock_shortage_cost,
                "user_id" => $request->user_id,
                "company_id" => $request->company_id,
            ]);
            return $entry;
        }
    }

    public function destroy($id)
    {
        $entry = Entry::findOrFail($id);
        $entry->delete();
        return response()->json([
            'message' => 'Entry deleted successfully.',
            'status' => 'success'
        ]);
    }
}
