@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quán lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách người dùng</h1>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
        <th scope="col">Email</th>
        <th scope="col">Nhóm</th>
        <th scope="col">Hình thức đăng nhập</th>
        <th scope="col">Ảnh đại diện</th>
        <th scope="col">Sửa</th>
        <th scope="col">Xoá</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $i => $item)
        <tr>
          <th scope="row">{{ $i + 1 }}</th>
          <td>{{ $item->name }}</td>
          <td>{{ $item->email }}</td>
          <td>{{ $item->group->name }}</td>
          <td>{{ $item->provider ?? 'Hệ thống' }}</td>
          <td><img width="50" height="50" src="{{$item->avatar}}" alt=""></td>
          @if (!$item->provider_id)
            <td> 
              <a href="{{route('admin.users.update', ['user' => $item])}}" class="btn btn-warning">Sửa</a>
            </td>
          @else
            <td></td>
          @endif
          <td>
            <a href="{{route('admin.users.delete', ['id' => $item->id])}}" class="btn btn-danger">Xoá</a>  
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection