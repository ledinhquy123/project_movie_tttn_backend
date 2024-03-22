@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quản lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật người dùng</h1>
  </div>

  <form action="{{route('admin.users.handleUpdate')}}" method="post">
    @csrf

    <input id="fullName" type="hidden" class="form-control" name="id" value="{{ $user['id'] }}">
    <div class="form-group">
        <label for="fullName">Tên</label>
        <input id="fullName" type="text" class="form-control" value="{{ old('name') ?? $user['name'] }}" name="name" autofocus>
        @error('name')
          <p style="color: red; font-weight: bold">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="text" class="form-control" value="{{ old('email') ?? $user['email']}}" name="email">
        @error('email')
          <p style="color: red; font-weight: bold">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
      <label for="avatar">Link ảnh đại diện (Để nguyên nếu không đổi)</label>
      <input id="avatar" type="text" class="form-control" value="{{ old('avatar') ?? $user['avatar'] }}" name="avatar">
      @error('avatar')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-primary btn-block">
          Cập nhật
        </button>
    </div>
  </form>
@endsection