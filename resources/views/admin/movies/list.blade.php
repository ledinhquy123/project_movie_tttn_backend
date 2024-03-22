@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quán lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách phim</h1>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
        <th scope="col">Thể loại</th>
        <th scope="col">Tổng quan</th>
        <th scope="col">Ảnh poster</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Sửa</th>
        <th scope="col">Xoá</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($movies as $i => $item)
        <tr>
          <th scope="row">{{ $i + 1 }}</th>
          <td>{{ $item->title }}</td>
          <td>{{ $item->genres }}</td>
          <td>{{ $item->over_view }}</td>
          <td><img width="50" height="50" src="{{$item->poster_path}}" alt=""></td>
          <td>{{ $item->status == 1 ? 'Đang chiếu' : 'Chưa chiếu' }}</td>
          <td> 
            <a href="" class="btn btn-warning">Sửa</a>
          </td>
          <td>
            <a href="{{route('admin.movies.delete', ['id' => $item->id_movie])}}" class="btn btn-danger">Xoá</a>  
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection