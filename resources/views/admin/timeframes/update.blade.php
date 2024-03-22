@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quản lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật khung giờ</h1>
  </div>

  <form action="{{route('admin.timeframes.handleUpdate')}}" method="post">
    @csrf

    <div class="form-group">
      <input id="idTimeframes" type="hidden" class="form-control" value="{{ $timeframes['id'] }}" name="idTimeframes" autofocus>
  </div>
    <div class="form-group">
        <label for="startTime">Khung giờ</label>
        <input id="startTime" type="time" class="form-control" value="{{ old('startTime') ?? $timeframes['startTime']}}" name="startTime" autofocus>
        @error('startTime')
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