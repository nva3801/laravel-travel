@extends('welcome')
@section('content')
<a href="{{ route('news.create') }}" class="mb-3 btn btn-success">Thêm Tin Tức</a>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Quản Lý Tin Tức</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Nội Dung</th>
                            <th>Trạng Thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sn = 1;
                        @endphp
                        @foreach ($news as $news)
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $news->title }}</td>
                                <td>{{ $news->description }}</td>
                                <td>{{ $news->content }}</td>
                                <td>
                                    @if ($news->status === 1)
                                        Hiển Thị
                                    @else
                                        Không Hiển Thị
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('news.edit', $news) }}" class="btn btn-warning">Sửa</a>
                                    <form action="{{ route('news.destroy', $news) }}" method="POST">
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