@extends('welcome')
@section('content')
    <a href="{{ route('product-image.index') }}" class="mb-3 btn btn-danger">Quay Lại</a>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Thêm Danh Mục</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('product-image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Mã Danh Mục</label>
                    <select name="product_id"  class="form-control">
                        @foreach ($product as $product)
                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hình Ảnh 1</label>
                    <input type="file" name="image1" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hình Ảnh 2</label>
                    <input type="file" name="image2" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hình Ảnh 3</label>
                    <input type="file" name="image3" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hình Ảnh 4</label>
                    <input type="file" name="image4" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hình Ảnh 5</label>
                    <input type="file" name="image5" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Thêm</button>
            </form>
        </div>
    </div>
@endsection

