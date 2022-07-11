@extends('welcome')
@section('content')
<a href="{{ route('product.create') }}" class="mb-3 btn btn-success">Thêm Danh Mục</a>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Quản Lý Danh Mục</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên tour</th>
                            <th>Danh Mục</th>
                            <th>Hình Ảnh</th>
                            <th>Trạng Thái</th>
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
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->category_item->title }}</td>
                                <td>
                                    @if ($product->status === 1)
                                        Hiển Thị
                                    @else
                                        Không Hiển Thị
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('product.edit', $product) }}" class="btn btn-warning">Sửa</a>
                                    <form action="{{ route('product.destroy', $product) }}" method="POST">
                                        @csrf   
                                        @method('DELETE')
                                        <button class="btn btn-danger">Xóa</button>
                                    </form>
                                    <a href="{{ route('product-show-image', $product->id) }}" class="btn btn-success">Hình Ảnh</a>
                                    <a href="{{ route('product-show-time', $product->id) }}" class="btn btn-success">Thời gian</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection