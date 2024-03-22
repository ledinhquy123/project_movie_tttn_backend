@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quản lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm người dùng</h1>
  </div>

  <form action="{{route('admin.users.handleCreate')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="fullName">Tên</label>
        <input id="fullName" type="text" class="form-control" value="{{ old('name')}}" name="name" autofocus>
        @error('name')
          <p style="color: red; font-weight: bold">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="text" class="form-control" value="{{ old('email')}}" name="email">
        @error('email')
          <p style="color: red; font-weight: bold">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
      <label for="password">Mật khẩu</label>
      <input id="password" type="password" class="form-control" value="{{ old('password')}}" name="password">
      @error('password')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="avatar">Link ảnh đại diện (Để nguyên nếu không đổi)</label>
      <input id="avatar" type="text" class="form-control" value="{{ old('avatar') ?? 'https://i.pinimg.com/736x/c6/e5/65/c6e56503cfdd87da299f72dc416023d4.jpg' }}" name="avatar">
      @error('avatar')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="group">Nhóm</label>
      <select name="group" id="group" class="form-control">
        @foreach ($groups as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group mb-0">
      <button type="submit" class="btn btn-primary btn-block">
        Tạo
      </button>
    </div>
  </form>
@endsection