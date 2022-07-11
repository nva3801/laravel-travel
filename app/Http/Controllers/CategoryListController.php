<?php

namespace App\Http\Controllers;

use App\Models\CategoryList;
use App\Http\Requests\StoreCategoryListRequest;
use App\Http\Requests\UpdateCategoryListRequest;
use App\Models\Category;

class CategoryListController extends Controller
{
    public function index()
    {
        $category_list = CategoryList::get();
        return view('category_list.index', [
            'category_list' => $category_list,
        ]);
    }

    public function create()
    {
        $category = Category::where('status', 1)->get();
        return view('category_list.create', [
            'category' => $category,
        ]);
    }

    public function store(StoreCategoryListRequest $request)
    {
        CategoryList::create($request->validated());
        return redirect()->route('category-list.index');
    }

    public function show(CategoryList $categoryList)
    {
        //
    }

    public function edit(CategoryList $categoryList)
    {
        $category = Category::where('status', 1)->get();
        return view('category_list.edit', [
            'categorylist' => $categoryList,
            'category'=>$category,
        ]);
    }

    public function update(UpdateCategoryListRequest $request, CategoryList $categoryList)
    {
        $categoryList->fill($request->validated());
        $categoryList->save();
        return redirect()->route('category-list.index');
    }

    public function destroy(CategoryList $categoryList)
    {
        $categoryList->delete();
        return redirect()->route('category-list.index');
    }
}