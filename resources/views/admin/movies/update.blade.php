@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quản lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm phim</h1>
  </div>

  <form action="{{route('admin.movies.handleCreate')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="title">Tên</label>
        <input id="title" type="text" class="form-control" value="{{ old('name')}}" name="title" autofocus>
        @error('title')
          <p style="color: red; font-weight: bold">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="genres">Thể loại</label>
        <input id="genres" type="text" class="form-control" value="{{ old('genres')}}" name="genres">
        @error('genres')
          <p style="color: red; font-weight: bold">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
      <label for="overView">Tổng quan</label>
      <input id="overView" type="text" class="form-control" value="{{ old('overView')}}" name="overView">
      @error('overView')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="posterPath">Ảnh poster</label>
      <input id="posterPath" type="text" class="form-control" value="{{ old('posterPath')}}" name="posterPath">
      @error('posterPath')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="backdropPath">Ảnh backdrop</label>
      <input id="backdropPath" type="text" class="form-control" value="{{ old('backdropPath')}}" name="backdropPath">
      @error('backdropPath')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="videoPath">Link trailer</label>
      <input id="videoPath" type="text" class="form-control" value="{{ old('videoPath')}}" name="videoPath">
      @error('videoPath')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="country">Quốc gia</label>
      <input id="country" type="text" class="form-control" value="{{ old('country')}}" name="country">
      @error('country')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="runtime">Độ dài phim(phút)</label>
      <input id="runtime" type="text" class="form-control" value="{{ old('runtime')}}" name="runtime">
      @error('runtime')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="releaseDate">Ngày phát hành</label>
      <input id="releaseDate" type="date" class="form-control" value="{{ old('releaseDate')}}" name="releaseDate">
      @error('releaseDate')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="status">Trạng thái</label>
      <select name="status" id="status" class="form-control">
        <option value="0">Chưa chiếu</option>
        <option value="1">Đang chiếu</option>
      </select>
    </div>

    <div class="form-group mb-0">
      <button type="submit" class="btn btn-primary btn-block">
        Tạo
      </button>
    </div>
  </form>
@endsection