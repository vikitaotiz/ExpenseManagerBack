<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Resources\Accounts\AccountResource;

class AccountsController extends Controller
{
    public function index()
    {
        return AccountResource::collection(Account::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $account = Account::where([
            'supplier_id'=> $request->supplier_id, 
            'initial_amount' => $request->initial_amount])
        ->first();
        
        if($account) return response()->json([
            'status' => 'error',
            'message' => 'Account already exists.',
        ]);

        Account::create([
            "supplier_id" => $request->supllier_id,
            "initial_amount" => $request->initial_amount,
            "amount_settled" => $request->amount_settled,
            "balance" => $request->balance,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Account created successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $account = Account::findOrFail($id);
        
        if(!$account) return response()->json([
            'status' => 'error',
            'message' => 'Account does not exists.',
        ]);

        $account->update([
            "supplier_id" => $request->supllier_id,
            "initial_amount" => $request->initial_amount,
            "amount_settled" => $request->amount_settled,
            "balance" => $request->balance,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Account updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return response()->json([
            'message' => 'Account deleted successfully.',
            'status' => 'success'
        ]);
    }
}
