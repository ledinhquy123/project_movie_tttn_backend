@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quản lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm màn hình</h1>
  </div>

  <form action="{{route('admin.screens.handleCreate')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="name">Tên</label>
        <input id="name" type="text" class="form-control" value="{{ old('name')}}" name="name" autofocus>
        @error('name')
          <p style="color: red; font-weight: bold">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group mb-0">
      <button type="submit" class="btn btn-primary btn-block">
        Tạo
      </button>
    </div>
  </form>
@endsection