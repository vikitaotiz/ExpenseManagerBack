<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Entry;
use App\Models\Purchase;
use App\Models\Company;
use App\Http\Resources\Entries\EntryResource;
use App\Http\Resources\Entries\SalesCategoryResource;
use App\Http\Resources\Purchases\PurchaseResource;
use App\Http\Resources\Companies\CompanyChartsResource;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function entries(Request $request)
    {
        if($request->from && $request->to){
            $data = Entry::whereBetween('created_at', [$request->from, $request->to])->get();
            return EntryResource::collection($data);
        }

    }

    public function purchases(Request $request)
    {
        if($request->from && $request->to){
            $data = Purchase::whereBetween('created_at', [$request->from, $request->to])->get();
            return PurchaseResource::collection($data);
        }

    }

    public function company_charts()
    {
        $companies = Company::orderBy('created_at', 'desc')->get();

        $companies = CompanyChartsResource::collection($companies);

        return response()->json([
            "data" => $companies
        ]);
    }

    public function entriesLastSevenDays()
    {
        $entries_days_number = array();

        for ($i = 0; $i < 7; $i++) {
            $day = Carbon::now()->subDays($i)->format('l');
            
            $sales = Entry::whereDate('created_at', Carbon::now()->subDays($i)->toDateString())->sum(DB::raw('entries.selling_price * entries.usage'));

            $purchases = Purchase::whereDate('created_at', Carbon::now()->subDays($i)->toDateString())->sum('total_amount');
            
            $data = ["day" => $day, "sales" => $sales, "purchases" => $purchases];
            array_push($entries_days_number, $data);
        }

        return ['data' => $entries_days_number];
    }


    public function sales_categories()
    {
        return SalesCategoryResource::collection(Entry::all());
    }
}
