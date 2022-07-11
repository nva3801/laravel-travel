@extends('welcome')
@section('content')
    <a href="{{ route('product.index') }}" class="mb-3 btn btn-danger">Quay Lại</a>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Thêm Danh Mục</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên Sản Phẩm</label>
                    <input type="text" name="title" class="form-control" placeholder="Tên Sản Phẩm" id="slug"
                        onkeyup="ChangeToSlug()">
                </div>
                <div class="form-group">
                    <label>Tên Sản Phẩm</label>
                    <input type="text" name="slug" class="form-control" placeholder="Tên Sản Phẩm" id="convert_slug">
                </div>
                <div class="form-group">
                    <label>Mã Danh Mục</label>
                    <select name="category_id"  class="form-control">
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
                    <textarea name="description" id="editor" class="form-control" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label>Phương Tiện</label>
                    <input type="text" name="vehicle" class="form-control" placeholder="Phương Tiện">
                </div>
                <div class="form-group">
                    <label>Điểm Bắt Đầu</label>
                    <input type="text" name="starting_point" class="form-control" placeholder="Điểm Bắt Đầu">
                </div>  
                <div class="form-group">
                    <label>Điểm Đến</label>
                    <input type="text" name="destination" class="form-control" placeholder="Điểm Đến">
                </div>  
                <div class="form-group">
                    <label>Thời gian</label>
                    <input type="text" name="time" class="form-control" placeholder="Thời gian">
                </div>
                <div class="form-group">
                    <label>Chương trình tour</label>
                    <textarea name="tour" id="editor1" class="form-control" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label>Chính sách tour</label>
                    <textarea name="tour_policy" id="editor2" class="form-control" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <select name="status" class="form-control ">
                        <option value="1">Hiển Thị</option>
                        <option value="0">Không Hiển Thị</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Thêm</button>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#address').select2({
            multiple: true,
        })
    </script>
@endpush
