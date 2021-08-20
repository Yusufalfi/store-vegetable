<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        //menghitung user atau customer
        $customer = User::count();
        $revenue = Transaction::sum('total_price');
        $transaction = User::count();

        // jika inginmernghitung teransaksi yang sukse saja
        // $revenue = Transaction::where('transaction_status', 'SUCCESS')->sum('total_price');


        return view('pages.admin.dashboard', compact('customer', 'revenue', 'transaction'));
    }
}
