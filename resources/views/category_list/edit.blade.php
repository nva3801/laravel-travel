@extends('welcome')
@section('content')
    <a href="{{ route('category-list.index') }}" class="mb-3 btn btn-danger">Quay Lại</a>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Thêm Danh Mục</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('category-list.update', $categorylist->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <input type="text" name="title" class="form-control" value="{{ $categorylist->title }}"
                        placeholder="Tên danh mục" id="slug" onkeyup="ChangeToSlug()">
                </div>
                <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <input type="text" name="slug" class="form-control" value="{{ $categorylist->slug }}"
                        placeholder="Tên danh mục" id="convert_slug">
                </div>
                <div class="form-group">
                    <label>Mã Danh Mục</label>
                    <select name="category_id" class="form-control">
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <select name="status" class="form-control ">
                        <option value="1">Hiển Thị</option>
                        <option value="0">Không Hiển Thị</option>
                    </select>
                </div>
                <button class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
@endsection
