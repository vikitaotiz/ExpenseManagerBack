<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Category;
use App\Models\Product;
use App\Models\Company;
use App\Models\User;
use  Carbon\Carbon;

class StatsController extends Controller
{

    public function index()
    {
        $all_entries = Entry::all()->count();
        $today_entries = Entry::whereDate('created_at', Carbon::today())->count();
        $categories = Category::all()->count();
        $products = Product::all()->count();
        $companies = Company::all()->count();
        $users = User::all()->count();

        return response()->json([
            "data" => [
                "all_entries" => $all_entries,
                "today_entries" => $today_entries,
                "categories" => $categories,
                "products" => $products,
                "companies" => $companies,
                "users" => $users
            ]
        ]);
    }
}
