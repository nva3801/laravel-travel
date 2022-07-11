@extends('welcome')
@section('content')
<a href="{{ route('product-tourcode.create') }}" class="mb-3 btn btn-success">Thêm Thời Gian</a>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Quản Lý Thời Gian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Danh Mục</th>
                            <th>Khởi hành</th>
                            <th>Mã tour</th>
                            <th>Giá người lớn</th>
                            <th>Giá trẻ em</th>
                            <th>Giá em bé</th>
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
                                <td>{{ $product->tour_code }}</td>
                                <td>{{ date('d-m-Y', strtotime($product->start)) }}</td>
                                <td>{{ number_format($product->price_adult) }}đ</td>
                                <td>{{ number_format($product->price_children) }}đ</td>
                                <td>{{number_format($product->price_baby) }}đ</td>
                                <td class="d-flex">
                                    <a href="{{ route('product-tourcode.edit', $product) }}" class="btn btn-warning">Sửa</a>
                                    <form action="{{ route('product-tourcode.destroy', $product->id) }}" method="POST">
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