@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quản lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm lịch chiếu</h1>
  </div>

  <form action="{{route('admin.showtimes.handleCreate')}}" method="post">
    @csrf

    <div class="form-group">
      <label for="screenId">Phòng chiếu</label>
      <select name="screenId" id="screenId" class="form-control">
        @foreach ($screens as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="idMovie">Phim chiếu</label>
      <select name="idMovie" id="idMovie" class="form-control">
        @foreach ($movies as $item)
          <option value="{{ $item->id_movie }}">{{ $item->title }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="weekdayId">Ngày chiếu</label>
      <select name="weekdayId" id="weekdayId" class="form-control">
        @foreach ($weekdays as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="timframeId">Khung thời gian chiếu</label>
      <select name="timframeId" id="timframeId" class="form-control">
        @foreach ($timframes as $item)
          <option value="{{ $item->id }}">{{ $item->start_time }}</option>
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