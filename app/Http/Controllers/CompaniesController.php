<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Resources\Companies\CompanyResource;

class CompaniesController extends Controller
{
    public function index()
    {
        return CompanyResource::collection(Company::orderBy('created_at', 'desc')->get());
    }

    public function company_entries()
    {
        $data = CompanyResource::collection(Company::orderBy('created_at', 'desc')->get());

        return $data->filter(function($var)
        {
            return $var->entries->count() > 0;
        });
    }

    public function show($slug)
    {
        $company = Company::where('slug', $slug)->first();
        if(!$company) return "Company not found...";
        return new CompanyResource($company);
    }
}
