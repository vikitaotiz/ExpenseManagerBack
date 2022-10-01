<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Account;
use App\Http\Resources\Purchases\PurchaseResource;
use Carbon\Carbon;

class PurchasesController extends Controller
{
    public function index()
    {
        return PurchaseResource::collection(Purchase::orderBy('created_at', 'desc')->get());
    }

    public function today_purchases()
    {
        $data = Purchase::whereDate('created_at', Carbon::today())->get();

        if(auth()->user()->id === 1 && auth()->user()->role_id === 1){
            $purchases = $data->sortByDesc('created_at');
        } else {
            $purchases = $data->where('company_id', auth()->user()->company_id);
        }

        return PurchaseResource::collection($purchases);
    }

    public function all_purchases()
    {
        $data = Purchase::all();

        if(auth()->user()->id === 1 && auth()->user()->role_id === 1){
            $purchases = $data->sortByDesc('created_at');
        } else {
            $purchases = $data->where('company_id', auth()->user()->company_id);
        }
        
        return PurchaseResource::collection($purchases);
    }

    public function store(Request $request)
    {
        // $purchase = Purchase::whereDate('created_at', Carbon::today())
        //                 ->where('user_id', '=', $request->user_id)
        //                 ->where('company_id', '=', $request->company_id)
        //                 ->first();

        // if($purchase) return response()->json([
        //     'status' => 'error',
        //     'message' => 'Purchase already made today.',
        // ]);

        Purchase::create([
            'product' => $request->product,
            'quantity' => $request->quantity,
            'issued' => $request->issued,
            'opening_stock' => $request->opening_stock,
            'closing_stock' => $request->closing_stock,
            'measurement' => $request->measurement,
            'total_amount' => $request->total_amount,
            'unit_price' => $request->unit_price,
            'balance' => $request->balance,
            'user_id' => $request->user_id,
            'company_id' => $request->company_id,
            'payment_mode_id' => $request->payment_mode_id,
            'supplier_id' => $request->supplier_id,
            'actual_stock' => $request->actual_stock
        ]);

        Account::create([
            'supplier_id' => $request->supplier_id,
            'initial_amount' => $request->total_amount,
            'amount_settled' => 0,
            'balance' => 0
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Purchase created successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $purchase = Purchase::findOrFail($id);
        
        if(!$purchase) return response()->json([
            'status' => 'error',
            'message' => 'Purchase does not exists.',
        ]);

        $purchase->update([
            'product' => $request->product,
            'quantity' => $request->quantity,
            'issued' => $request->issued,
            'opening_stock' => $request->opening_stock,
            'closing_stock' => $request->closing_stock,
            'measurement' => $request->measurement,
            'total_amount' => $request->total_amount,
            'unit_price' => $request->unit_price,
            'balance' => $request->balance,
            'user_id' => $request->user_id,
            'company_id' => $request->company_id,
            'payment_mode_id' => $request->payment_mode_id,
            'supplier_id' => $request->supplier_id,
            'actual_stock' => $request->actual_stock
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Purchase updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return response()->json([
            'message' => 'Purchase deleted successfully.',
            'status' => 'success'
        ]);
    }
}
