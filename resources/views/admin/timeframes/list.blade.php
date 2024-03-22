@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quán lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách khung giờ</h1>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
        <th scope="col">Sửa</th>
        <th scope="col">Xoá</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($timeframes as $i => $item)
        <tr>
          <th scope="row">{{ $i + 1 }}</th>
          <td>{{ $item->start_time }}</td>
          <td> 
            <a href="{{route('admin.timeframes.update', ['timeframes' => $item])}}" class="btn btn-warning">Sửa</a>
          </td>
          <td>
            <a href="{{route('admin.timeframes.delete', ['id' => $item->id])}}" class="btn btn-danger">Xoá</a>  
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection