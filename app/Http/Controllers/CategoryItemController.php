<?php

namespace App\Http\Controllers;

use App\Models\CategoryItem;
use App\Http\Requests\StoreCategoryItemRequest;
use App\Http\Requests\UpdateCategoryItemRequest;
use App\Models\CategoryList;
use Illuminate\Support\Facades\Storage;

class CategoryItemController extends Controller
{
    public function index()
    {
        $category_item = CategoryItem::get();
        return view('category_item.index', [
            'category_item' => $category_item,
        ]);
    }

    public function create()
    {
        $category_list = CategoryList::where('status', 1)->get();
        return view('category_item.create', [
            'category_list' => $category_list,
        ]);
    }

    public function store(StoreCategoryItemRequest $request)
    {
        $path = Storage::disk('public')->put('category_item', $request->file('image'));
        $arr = $request->validated();
        $arr['image'] = $path;
        CategoryItem::create($arr);
        return redirect()->route('category-item.index');
    }

    public function show(CategoryItem $categoryItem)
    {
        //
    }

    public function edit(CategoryItem $categoryItem)
    {
        $category_list = CategoryList::where('status', 1)->get();
        return view('category_item.edit', [
            'categoryitem' => $categoryItem,
            'category_list' => $category_list,
        ]);
    }

    public function update(UpdateCategoryItemRequest $request, CategoryItem $categoryItem)
    {
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('category_item', $request->file('image'));
            $arr = $categoryItem->fill($request->validated());
            $arr['image'] = $path;
        } else {
            $categoryItem->fill($request->validated());
        }
        $categoryItem->save();
        return redirect()->route('category-item.index');

    }

    public function destroy(CategoryItem $categoryItem)
    {
        $categoryItem->delete();
        return redirect()->route('category-item.index');
    }
}