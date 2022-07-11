<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{

    public function index()
    {
        $product = ProductImage::get();
        return view('product_image.index', [
            'product' => $product,
        ]);
    }

    public function create()
    {
        $product = Product::where('status', 1)->get();
        return view('product_image.create', [
            'product' => $product,
        ]);
    }

    public function store(StoreProductImageRequest $request)
    {
        $path1 = Storage::disk('public')->put('product_image', $request->file('image1'));
        $path2 = Storage::disk('public')->put('product_image', $request->file('image2'));
        $path3 = Storage::disk('public')->put('product_image', $request->file('image3'));
        $path4 = Storage::disk('public')->put('product_image', $request->file('image4'));
        $path5 = Storage::disk('public')->put('product_image', $request->file('image5'));
        $arr = $request->validated();
        $arr['image1'] = $path1;
        $arr['image2'] = $path2;
        $arr['image3'] = $path3;
        $arr['image4'] = $path4;
        $arr['image5'] = $path5;
        ProductImage::create($arr);
        return redirect()->route('product-image.index');
    }

    public function show(ProductImage $productImage)
    {
        //
    }

    public function edit(ProductImage $productImage)
    {
        //
    }

    public function update(UpdateProductImageRequest $request, ProductImage $productImage)
    {
        //
    }

    public function destroy(ProductImage $productImage)
    {
        //
    }
}