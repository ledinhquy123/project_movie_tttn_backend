<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\Ticket;
use App\Models\TransactionType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function index() {
        $user = json_decode(Cookie::get('user'), true);
        $tickets = Ticket::orderBy('created_at', 'desc')->get();
        return view('admin.tickets.list', compact(['user', 'tickets']));
    }

    public function update(Ticket $ticket) {
        $user = json_decode(Cookie::get('user'), true);
        $users = User::all();
        $movies = Movie::all();
        $transactionsType = TransactionType::all();
        return view('admin.tickets.update', compact('user', 'ticket', 'users', 'movies', 'transactionsType'));
    }

    public function handleUpdate(Request $request) {
        $user_id = $request->userId;
        $movie_id = $request->movieId;
        $screen_name = $request->screenName;
        $seats_name = $request->seatsName;
        $showdate = $request->showDate;
        $show_time = $request->showTime;
        $total_price = $request->totalPrice;
        $transaction_type_id = $request->transactionTypeId;

        $rules = [
            'userId' => 'required',
            'movieId' => 'required',
            'screenName' => 'required',
            'seatsName' => 'required',
            'showDate' => 'required',
            'showTime' => 'required',
            'totalPrice' => 'required',
            'transactionTypeId' => 'required',
        ];

        $messages = [
            'required' => ':attribute không được rỗng',
        ];

        $attributes = [
            'userId' => 'Người đặt',
            'movieId' => 'Tên phim',
            'screenName' => 'Tên phòng',
            'seatsName' => 'Tên ghế',
            'showDate' => 'Suất chiếu',
            'showTime' => 'Giờ chiếu',
            'totalPrice' => 'Tổng tiền',
            'transactionTypeId' => 'Phương thức',
        ];

        $validator =  Validator::make($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }   
        
        $ticket = Ticket::create([
            'user_id' => $user_id,
            'movie_id' => $movie_id,
            'screen_name' => $screen_name,
            'seats_name' => $seats_name,
            'showdate' => $showdate,
            'show_time' => $show_time,
            'total_price' => $total_price,
            'transaction_type_id' => $transaction_type_id
        ]);

        if($ticket) return redirect(route('admin.tickets.list'));
    }
}
