@extends('welcome')
@section('content')
    <a href="{{ route('product.index') }}" class="mb-3 btn btn-danger">Quay Lại</a>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Thêm Sản Phẩm</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <input type="text" name="title" class="form-control" value="{{ $product->title }}"
                        placeholder="Tên danh mục" id="slug" onkeyup="ChangeToSlug()">
                </div>
                <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <input type="text" name="slug" class="form-control" value="{{ $product->slug }}"
                        placeholder="Tên danh mục" id="convert_slug">
                </div>
                <div class="form-group">
                    <label>Mã Danh Mục</label>
                    <select name="category_id" class="form-control">
                        @foreach ($category_item as $category_item)
                            <option value="{{ $category_item->id }}">{{ $category_item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hình Ảnh</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" id="editor" class="form-control" cols="30" rows="5">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Phương Tiện</label>
                    <input type="text" name="vehicle" class="form-control" placeholder="Phương Tiện" value="{{ $product->vehicle }}" >
                </div>
                <div class="form-group">
                    <label>Điểm Bắt Đầu</label>
                    <input type="text" name="starting_point" class="form-control" placeholder="Điểm Bắt Đầu" value="{{ $product->starting_point }}">
                </div>  
                <div class="form-group">
                    <label>Điểm Đến</label>
                    <input type="text" name="destination" class="form-control" placeholder="Điểm Đến" value="{{ $product->destination }}">
                </div>  
                <div class="form-group">
                    <label>Thời gian</label>
                    <input type="text" name="time" class="form-control" placeholder="Thời gian" value="{{ $product->time }}">
                </div>
                <div class="form-group">
                    <label>Chương trình tour</label>
                    <textarea name="tour" id="editor1" class="form-control" cols="30" rows="5">{{ $product->tour }}</textarea>
                </div>
                <div class="form-group">
                    <label>Chính sách tour</label>
                    <textarea name="tour_policy" id="editor2" class="form-control" cols="30" rows="5">{{ $product->tour_policy }}</textarea>
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
