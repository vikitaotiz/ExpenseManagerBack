<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Company;
use App\Models\Product;
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

    private function todayRecords($var)
    {
        return $var->created_at->format('Y-m-d') === Carbon::today()->toDateString();
    }

    public function today_entries($slug)
    {
        $company = Company::where('slug', $slug)->first();
        $data = $company->entries
            ->filter(fn($var) => $this->todayRecords($var))
            ->sortByDesc('created_at');

        if(auth()->user()->id === 1 && auth()->user()->role_id === 1){
            $entries = $data->sortByDesc('created_at');
        } else {
            $entries = $data->where('company_id', auth()->user()->company_id);
        }

        return [
            'company_name' => $company->name,
            'data' => EntryResource::collection($entries)
        ];
    }

    public function show($slug)
    {
           $company = Company::where('slug', $slug)->first();
           if(!$company) return "Company not found...";
           return new CompanyResource($company);
    }

    public function store(Request $request)
    {
        $reord = Entry::whereDate('created_at', Carbon::today())
                        ->where('product_id', '=', $request->product_id)->first();
        
        if($reord){
            return response()->json([
                'message' => 'Entry for this product has already been made today. Please select a different one',
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

            $company = Company::findOrFail($request->company_id);

            $entry = Entry::create([
                "product_id" => $request->product_id,
                "unit_price" => $request->unit_price,
                "selling_price" => $request->selling_price,
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

            return response()->json([
                'message' => 'Entry created successfully.',
                'status' => 'success',
                'company_slug' => $company->slug
            ]);
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
