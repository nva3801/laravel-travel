<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::get();
        return view('news.index', [
            'news' => $news,
        ]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(StoreNewsRequest $request)
    {
        $path = Storage::disk('public')->put('news', $request->file('image'));
        $arr = $request->validated();
        $arr['image'] = $path;
        News::create($arr);
        return redirect()->route('news.index');
    }

    public function show(News $news)
    {
        //
    }

    public function edit(News $news)
    {
        //
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        //
    }

    public function destroy(News $news)
    {
        //
    }
}