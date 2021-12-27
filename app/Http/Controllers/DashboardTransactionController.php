<?php

namespace App\Http\Controllers;

use App\transactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    //
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sellTransactions = transactionDetail::with(['transaction.user', 'product.galleries'])->whereHas('product', function($product) {
            $product->where('users_id', Auth::user()->id);
        })->get();

        $buyTransactions = transactionDetail::with(['transaction.user', 'product.galleries'])->whereHas('transaction', function($transaction) {
            $transaction->where('users_id', Auth::user()->id);
        })->get();

        return view('pages.dashboard-transactions', compact('sellTransactions', 'buyTransactions'));
    }

    public function details(Request $request , $id)
    {
        $transaction = transactionDetail::with(['transaction.user', 'product.galleries'])->findOrFail($id);
        
        // dd($transaction);
        return view('pages.dashboard-transactions-details' , compact('transaction'));
    }

    public function update(Request $request , $id)
    {
        $data= $request->all();
        $item = transactionDetail::findOrFail($id);
        $item->update($data);

        return redirect()->route('dashboard-transaction-details', $id);
    }
}
