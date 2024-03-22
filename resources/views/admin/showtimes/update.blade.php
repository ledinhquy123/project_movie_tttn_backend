@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quản lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật lịch chiếu (Nếu không thay đổi hãy chọn lại các giá trị "đang chọn")</h1>
  </div>

  <form action="{{route('admin.showtimes.handleUpdate')}}" method="post">
    @csrf

    <div class="form-group">
      <input id="id" type="hidden" class="form-control" value="{{ $showtime['id'] }}" name="id">
    </div>

    <div class="form-group">
      <label for="screenId">Phòng chiếu</label>
      <select name="screenId" id="screenId" class="form-control">
        <option value="{{ $showtime['screen_id'] }}">{{ $showtime->screens->name }}(Đang chọn) </option>
        @foreach ($screens as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
      @error('screenId')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="idMovie">Phim chiếu</label>
      <select name="idMovie" id="idMovie" class="form-control">
        <option value="{{ $showtime['screen_id'] }}">{{ $showtime->movies->title }}(Đang chọn) </option>
        @foreach ($movies as $item)
          <option value="{{ $item->id_movie }}">{{ $item->title }}</option>
        @endforeach
      </select>
      @error('idMovie')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="weekdayId">Ngày chiếu</label>
      <select name="weekdayId" id="weekdayId" class="form-control">
        <option value="{{ $showtime['screen_id'] }}">{{ $showtime->weekdays->name }}(Đang chọn) </option>
        @foreach ($weekdays as $item)
          <option value="{{ $showtime['weekday_id'] ?? $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
      @error('weekdayId')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="timframeId">Khung thời gian chiếu</label>
      <select name="timframeId" id="timframeId" class="form-control">
        <option value="{{ $showtime['screen_id'] }}">{{ $showtime->timeframes->start_time }}(Đang chọn) </option>
        @foreach ($timframes as $item)
          <option value="{{ $showtime['timeframe_id'] ?? $item->id }}">{{ $item->start_time }}</option>
        @endforeach
      </select>
      @error('timframeId')
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