@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quán lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách vé</h1>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Người đặt</th>
        <th scope="col">Phim đặt</th>
        <th scope="col">Phòng đặt</th>
        <th scope="col">Ghế đặt</th>
        <th scope="col">Ngày chiếu</th>
        <th scope="col">Khung giờ chiếu</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Phương thức thanh toán</th>
        <th scope="col">Thời gian thanh toán</th>
        <th scope="col">Sửa</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tickets as $i => $item)
        <tr>
          <th scope="row">{{ $i + 1 }}</th>
          <td>{{ $item->user->name }}</td>
          <td>{{ $item->movie->title }}</td>
          <td>{{ $item->screen_name }}</td>
          <td>{{ $item->seats_name }}</td>
          <td>{{ $item->showdate }}</td>
          <td>{{ $item->show_time }}</td>
          <td>{{ $item->total_price }}</td>
          <td>{{ $item->transactionType->name }}</td>
          <td>{{ $item->created_at }}</td>
          <td> 
            <a href="{{ route('admin.tickets.update', ['ticket' => $item]) }}" class="btn btn-warning">Sửa</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection