<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $checkout = new Checkout();
        $checkout->tour_code = $request->tour_code;
        $checkout->number_adult = $request->number_adult;
        $checkout->number_children = $request->number_children;
        $checkout->number_baby = $request->number_baby;
        $checkout->name = $request->name;
        $checkout->phoneNumber = $request->phoneNumber;
        $checkout->email = $request->email;
        $checkout->payment_methods = $request->payment_methods;
        $checkout->total = $request->total;

        $checkout->save();

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}