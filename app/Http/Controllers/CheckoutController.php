<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Cart;
use App\Transaction;
use App\transactionDetail;
use Exception;

use Midtrans\Snap;
use Midtrans\Config;


class CheckoutController extends Controller
{
    //
    public function process(Request $request)
    {
        // simpan data user
        $user = Auth::user();
        $user->update($request->except('total-price'));

        // proses checkout
        $code = 'STORE-'. mt_rand(00000,99999);
        
        
        // dd($code);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();
        // dd($carts);

        // create transaksi
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'inscurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => (int) $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        foreach($carts as $cart) {
            $trx = 'TRX-'. mt_rand(00000,99999);

            transactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trx
            ]);
        }

        // return dd($carts);
        // delete cart data
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->delete();

        // konfig midtrans dan panggil di file variable nya
        // Set your Merchant Server Key
            Config::$serverKey = config('services.midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            Config::$isProduction = config('services.midtrans.isProduction');
            // Set sanitization on (default)
            Config::$isSanitized = config('services.midtrans.isSanitized');
            // Set 3DS transaction for credit card to true
            Config::$is3ds = config('services.midtrans.is3ds');

        // buat data array untuk di kirim ke midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone_number,
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bank_transfer', 'bca_va'
            ],
            'vtweb' => []
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            // Redirect to Snap Payment Page
            return redirect($paymentUrl);

            }
        catch (Exception $e) {
            echo $e->getMessage();
        }

        
    }

    public function callback(Request $request)
    {

    }
}
