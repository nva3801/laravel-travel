@extends('welcome')
@section('content')
    <a href="{{ route('news.index') }}" class="mb-3 btn btn-danger">Quay Lại</a>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Thêm Tin Tức</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tiêu Đề</label>
                    <input type="text" name="title" class="form-control" placeholder="Tiêu đề" id="slug"
                        onkeyup="ChangeToSlug()">
                </div>
                <div class="form-group">
                    <label>Tiêu Đề</label>
                    <input type="text" name="slug" class="form-control" placeholder="Tiêu Đề" id="convert_slug">
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
                    <label>Chương trình tour</label>
                    <textarea name="content" id="editor1" class="form-control" cols="30" rows="5"></textarea>
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
