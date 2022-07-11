@extends('welcome')
@section('content')
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Quản Lý Đơn Hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Mã Tour</th>
                            <th>Tên Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Email</th>
                            <th>Người Lớn</th>
                            <th>Trẻ con</th>
                            <th>Em Bé</th>
                            <th>Thanh toán</th>
                            <th>Tổng Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sn = 1;
                        @endphp
                        @foreach ($checkout as $checkout)
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $checkout->id }}</td>
                                <td>{{ $checkout->tour_code }}</td>
                                <td>{{ $checkout->name }}</td>
                                <td>{{ $checkout->phoneNumber }}</td>
                                <td>{{ $checkout->email }}</td>
                                <td>{{ $checkout->number_adult }}</td>
                                <td>{{ $checkout->number_children }}</td>
                                <td>{{ $checkout->number_baby }}</td>
                                @if($checkout->payment_methods == 1) 
                                <td>Thanh toán 100%</td>
                                @else
                                <td>Thanh toán 50%</td>
                                @endif
                                @if($checkout->payment_methods == 1) 
                                <td>{{ number_format($checkout->total) }}đ</td>
                                @else
                                <td>{{ number_format(($checkout->total)/2) }}đ</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection