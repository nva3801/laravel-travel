<?php

namespace App\Http\Controllers;

use App\Models\TourCode;
use App\Http\Requests\StoreTourCodeRequest;
use App\Http\Requests\UpdateTourCodeRequest;
use App\Models\Product;
use Carbon\Carbon;

class TourCodeController extends Controller
{

    public function index()
    {
        $product = TourCode::get();
        return view('tour_code.index', [
            'product' => $product,
        ]);
    }

    public function create()
    {
        $product = Product::where('status', 1)->get();
        return view('tour_code.create', [
            'product' => $product,
        ]);
    }

    public function store(StoreTourCodeRequest $request)
    {
        $arr = $request->validated();
        $tour_code = rand(0, 9999);
        $date = Carbon::now()->format('Y');
        $arr['tour_code'] = 'STN'.'-'.$date. '-'. $tour_code;
        TourCode::create($arr);
        return redirect()->route('product-tourcode.index');
    }

    public function show(TourCode $tourCode)
    {
        //
    }

    public function edit(TourCode $tourCode)
    {
        //
    }

    public function update(UpdateTourCodeRequest $request, TourCode $tourCode)
    {
        //
    }

    public function destroy($id)
    {
        $tourcode = TourCode::find($id);
        $tourcode->delete();
        return redirect()->back();
    }
}