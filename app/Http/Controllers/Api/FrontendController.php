<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryItem;
use App\Models\CategoryList;
use App\Models\News;
use App\Models\Product;
use App\Models\TourCode;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $category = Category::with('category_list')->get();
        return response()->json(['category' => $category]);
    }
    public function index_category_item() {
        $category_list = CategoryList::with('category_item')->get();
        return response()->json(['category_list' => $category_list]);
    }
    public function category($slug) {
        $category = CategoryItem::where('slug', $slug)->first();
        $product = Product::join('category_items', 'category_items.id', '=', 'products.category_id')
        ->where('products.category_id', $category->id)
        ->select('products.id', 'products.title', 'products.slug', 'products.image', 'products.description', 'products.time', 'products.vehicle')
        ->get();
        return response()->json([
            'category' => $category,
            'product' => $product,
        ]);
    }
    public function product($slug) {
        $product = Product::with('product_image', 'tour_code')->where('slug', $slug)->get();
        return response()->json([
            'product' => $product,
        ]);
    }
    public function checkout($tour_code) {
        $checkout = TourCode::with('product')->where('tour_code', $tour_code)->get();
        return response()->json([
            'checkout' => $checkout,
        ]);
    }
    public function news() {
        $news = News::where('status', 1)->get();
        return response()->json([
            'news' => $news,
        ]);
    }
    public function news_detail($slug) {
        $news = News::where('slug', $slug)->where('status', 1)->get();
        return response()->json([
            'news' => $news,
        ]);
    }
    public function local_address() {
        $category = Product::join('category_items', 'category_items.id', '=','products.category_id') 
        ->join('category_lists', 'category_lists.id', '=', 'category_items.category_id')
        ->join('categories', 'categories.id', '=', 'category_lists.category_id')
        ->where('categories.id', 6)
        ->select('products.id', 'products.title', 'products.slug', 'products.image')
        ->limit(5)
        ->get();
        return response()->json([
            'category' => $category,
        ]);
    }
    public function overseas() {
        $category = Product::join('category_items', 'category_items.id', '=','products.category_id') 
        ->join('category_lists', 'category_lists.id', '=', 'category_items.category_id')
        ->join('categories', 'categories.id', '=', 'category_lists.category_id')
        ->where('categories.id', 7)
        ->select('products.id', 'products.title', 'products.slug', 'products.image')
        ->limit(5)
        ->get();
        return response()->json([
            'category' => $category,
        ]);
    }
}