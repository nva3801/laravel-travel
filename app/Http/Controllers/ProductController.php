<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\CategoryItem;
use App\Models\ProductImage;
use App\Models\TourCode;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = Product::get();
        return view('product.index', [
            'product' => $product,
        ]);
    }

    public function create()
    {
        $category_item = CategoryItem::where('status', 1)->get();
        return view('product.create', [
            'category_item' => $category_item,
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $path = Storage::disk('public')->put('product', $request->file('image'));
        $arr = $request->validated();
        $arr['image'] = $path;
        Product::create($arr);
        return redirect()->route('product.index');
        // echo $arr['category_id'];
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $category_item = CategoryItem::where('status', 1)->get();
        return view('product.edit', [
            'product' => $product,
            'category_item' => $category_item,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('product', $request->file('image'));
            $arr = $product->fill($request->validated());
            $arr['image'] = $path;
        } else {
            $product->fill($request->validated());
        }
        $product->save();
        return redirect()->route('product.index');

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
    public function showImage($id)
    {
        $product = ProductImage::where('product_id', $id)->get();
        return view('product_image.index', [
            'product' => $product,
        ]);
    }
    public function showTime($id)
    {
        $product = TourCode::where('product_id', $id)->get();
        return view('tour_code.index', [
            'product' => $product,
        ]);
    }
}