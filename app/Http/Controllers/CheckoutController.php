<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout() {
        $checkout = Checkout::get();
        return view('checkout.index', [
            'checkout' => $checkout,
        ]);
    }
}