@extends('welcome')
@section('content')
    <a href="{{ route('product-tourcode.index') }}" class="mb-3 btn btn-danger">Quay Lại</a>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Thêm Thời Gian</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('product-tourcode.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label>Khởi Hành</label>
                    <input type="date" name="start" class="form-control" placeholder="Thời gian">
                </div>
                <div class="form-group">
                    <label>Giá Người Lớn</label>
                    <input type="text" name="price_adult" class="form-control" placeholder="Thời gian">
                </div>  
                <div class="form-group">
                    <label>Giá Trẻ Em</label>
                    <input type="text" name="price_children" class="form-control" placeholder="Thời gian">
                </div>  
                <div class="form-group">
                    <label>Giá Em Bé</label>
                    <input type="text" name="price_baby" class="form-control" placeholder="Thời gian">
                </div>  
                <button type="submit" class="btn btn-success">Thêm</button>
            </form>
        </div>
    </div>
@endsection

