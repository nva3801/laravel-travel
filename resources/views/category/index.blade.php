@extends('welcome')
@section('content')
<a href="{{ route('category.create') }}" class="mb-3 btn btn-success">Thêm Danh Mục</a>
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
                            <th>Tên Danh Mục</th>
                            <th>Trạng Thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sn = 1;
                        @endphp
                        @foreach ($category as $category)
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    @if ($category->status === 1)
                                        Hiển Thị
                                    @else
                                        Không Hiển Thị
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('category.edit', $category) }}" class="btn btn-warning">Sửa</a>
                                    <form action="{{ route('category.destroy', $category) }}" method="POST">
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