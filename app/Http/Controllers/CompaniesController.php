<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Resources\Companies\CompanyResource;
use App\Http\Resources\Companies\CompanyTodayResource;
use Carbon\Carbon;

class CompaniesController extends Controller
{
    public function index()
    {
        if(auth()->user()->id === 1 && auth()->user()->role_id === 1){
            return CompanyResource::collection(Company::orderBy('created_at', 'desc')->get());
        } else {
            $data = Company::where('id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
            return CompanyResource::collection($data);
        }
    }

    private function todayRecords($var)
    {
        return $var->created_at->format('Y-m-d') === Carbon::today()->toDateString();
    }

    public function company_entries()
    {
        if(auth()->user()->id === 1 && auth()->user()->role_id === 1){
            $companies = Company::orderBy('created_at', 'desc')->get();
        } else {
            $companies = Company::where('id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        $companies = CompanyTodayResource::collection($companies);

        $data = $companies->filter(function($var)
        {
            return $var->entries->filter(fn($var) => $this->todayRecords($var))->count() > 0;
        });

        return response()->json([
            "data" => $data
        ]);

    }

    public function show($slug)
    {
        $company = Company::where('slug', $slug)->first();
        if(!$company) return "Company not found...";
        return new CompanyResource($company);
    }
}
