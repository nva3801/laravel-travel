@extends('welcome')
@section('content')
<a href="{{ route('product-image.create') }}" class="mb-3 btn btn-success">Thêm Hình Ảnh</a>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Quản Lý Hình Ảnh</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Danh Mục</th>
                            <th>Hình Ảnh 1</th>
                            <th>Hình Ảnh 2</th>
                            <th>Hình Ảnh 3</th>
                            <th>Hình Ảnh 4</th>
                            <th>Hình Ảnh 5</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sn = 1;
                        @endphp
                        @foreach ($product as $product)
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $product->product->title }}</td>
                                <td><img src="{{ asset('storage/' . $product->image1) }}" alt="" width="90%">
                                <td><img src="{{ asset('storage/' . $product->image2) }}" alt="" width="90%">
                                <td><img src="{{ asset('storage/' . $product->image3) }}" alt="" width="90%">
                                <td><img src="{{ asset('storage/' . $product->image4) }}" alt="" width="90%">
                                <td><img src="{{ asset('storage/' . $product->image5) }}" alt="" width="90%">
                                <td class="d-flex">
                                    <a href="{{ route('product-image.edit', $product) }}" class="btn btn-warning">Sửa</a>
                                    <form action="{{ route('product-image.destroy', $product) }}" method="POST">
                                        @csrf   
                                        @method('DELETE')
                                        <button class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection