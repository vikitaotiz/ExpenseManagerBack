<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Resources\Companies\CompanyResource;

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

    public function company_entries()
    {
        if(auth()->user()->id === 1 && auth()->user()->role_id === 1){
            $companies = Company::orderBy('created_at', 'desc')->get();
        } else {
            $companies = Company::where('id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        $companies = CompanyResource::collection($companies);

        $data = $companies->filter(function($var)
        {
            return $var->entries->count() > 0;
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
