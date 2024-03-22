@extends('layouts.admin')

{{-- Tham số truyền qua layout --}}
@section('title', 'Quản lý người dùng')
@section('fullName', $user['name'])
@section('avatar', $user['avatar'])

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật giao dịch</h1>
  </div>

  <form action="{{route('admin.tickets.handleUpdate')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="title">Tên người đặt</label>
        <select name="userId" id="userId" class="form-control">
          <option value="{{ $ticket->user->id }}">{{ $ticket->user->name }}(Đang chọn) </option>
          @foreach ($users as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
        @error('userId')
          <p style="color: red; font-weight: bold">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
      <label for="movieId">Tên phim đặt</label>
      <select name="movieId" id="movieId" class="form-control">
        <option value="{{ $ticket->movie->id_movie }}">{{ $ticket->movie->title }}(Đang chọn) </option>
        @foreach ($movies as $item)
          <option value="{{ $item->id_movie }}">{{ $item->title }}</option>
        @endforeach
      </select>
      @error('movieId')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="screenName">Phòng đặt</label>
      <input id="screenName" type="text" class="form-control" value="{{ old('screenName') ?? $ticket->screen_name }} " name="screenName">
      @error('screenName')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="seatsName">Ghế đặt</label>
      <input id="seatsName" type="text" class="form-control" value="{{ old('seatsName') ?? $ticket->seats_name }} " name="seatsName">
      @error('seatsName')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="showDate">Ngày đặt</label>
      <input id="showDate" type="text" class="form-control" value="{{ old('showDate') ?? $ticket->showdate }}" name="showDate">
      @error('showDate')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="showTime">Khung giờ đặt</label>
      <input id="showTime" type="text" class="form-control" value="{{ old('showTime') ?? $ticket->show_time }}" name="showTime">
      @error('showTime')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="totalPrice">Tổng tiền</label>
      <input id="totalPrice" type="text" class="form-control" value="{{ old('totalPrice') ?? $ticket->total_price }}" name="totalPrice">
      @error('totalPrice')
        <p style="color: red; font-weight: bold">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group">
      <label for="transactionTypeId">Phương thức giao dịch</label>
      <select name="transactionTypeId" id="transactionTypeId" class="form-control">
        <option value="{{ $ticket->transactionType->id }}">{{ $ticket->transactionType->name }}(Đang chọn) </option>
        @foreach ($transactionsType as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
      @error('transactionTypeId')
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