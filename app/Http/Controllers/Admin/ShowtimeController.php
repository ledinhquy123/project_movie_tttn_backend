<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\Showtime;
use App\Models\Timeframe;
use App\Models\Weekday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class ShowtimeController extends Controller
{
    public function index() {
        $user = json_decode(Cookie::get('user'), true);
        $showtimes = Showtime::orderBy('created_at', 'desc')->get();
        return view('admin.showtimes.list', compact(['user', 'showtimes']));
    }

    public function create() {
        $user = json_decode(Cookie::get('user'), true);
        $screens = Screen::all();
        $movies = Movie::where('status', '1')->get();
        $weekdays = Weekday::all();
        $timframes = Timeframe::all();
        return view('admin.showtimes.add', compact(['user', 'screens', 'movies', 'weekdays', 'timframes']));
    }

    public function handleCreate(Request $request) {
        $data = [
            'screen_id' => $request->screenId,
            'id_movie' => $request->idMovie,
            'weekday_id' => $request->weekdayId,
            'timeframe_id' => $request->timframeId
        ];
        $showtime = Showtime::create($data);
        if($showtime) return redirect(route('admin.showtimes.list'));
    }

    public function update(Showtime $showtime) {
        $user = json_decode(Cookie::get('user'), true);
        $screens = Screen::all();
        $movies = Movie::where('status', '1')->get();
        $weekdays = Weekday::all();
        $timframes = Timeframe::all();
        return view('admin.showtimes.update', compact('user', 'screens', 'movies', 'weekdays', 'timframes', 'showtime'));
    }

    public function handleUpdate(Request $request) {
        $screen_id = $request->screenId;
        $id_movie = $request->idMovie;
        $weekday_id = $request->weekdayId;
        $timeframe_id = $request->timframeId;
        $id = $request->id;

        $rules = [
            'screenId' => 'required',
            'idMovie' => 'required',
            'weekdayId' => 'required',
            'timframeId' => 'required',
        ];

        $messages = [
            'required' => ':attribute không được rỗng',
        ];

        $attributes = [
            'screen_id' => 'Phòng',
            'id_movie' => 'Phim',
            'weekday_id' => 'Ngày trong tuần',
            'timeframe_id' => 'Khung thời gian'
        ];

        $validator =  Validator::make($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }        

        $showtime = Showtime::find($id);
        $showtime->screen_id = $screen_id;
        $showtime->id_movie = $id_movie;
        $showtime->weekday_id = $weekday_id;
        $showtime->timeframe_id = $timeframe_id;
        $showtime->save();

        return redirect(route('admin.showtimes.list'));
    }
}
