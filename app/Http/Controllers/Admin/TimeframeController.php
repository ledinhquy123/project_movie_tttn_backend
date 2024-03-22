<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeframe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class TimeframeController extends Controller
{
    public function index() {
        $user = json_decode(Cookie::get('user'), true);
        $timeframes = Timeframe::orderBy('created_at', 'desc')->get();

        return view('admin.timeframes.list', compact(['user', 'timeframes']));
    }

    public function create() {
        $user = json_decode(Cookie::get('user'), true);
        return view('admin.timeframes.add', compact(['user']));
    }

    public function handleCreate(Request $request) {
        $startTime = $request->startTime;
    
        $rules = [
            'startTime' => 'required',
        ];

        $messages = [
            'required' => ':attribute không được rỗng',
        ];

        $attributes = [
            'startTime' => 'Khung thời gian',
        ];

        $validator =  Validator::make($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $timeframe = Timeframe::create([
            'start_time' => $startTime
        ]);
        if($timeframe) return redirect(route('admin.timeframes.list'));
    }

    public function update(Timeframe $timeframes) {
        $user = json_decode(Cookie::get('user'), true);
        return view('admin.timeframes.update', compact(['user', 'timeframes']));
    }

    public function handleUpdate(Request $request) {
        $startTime = $request->startTime;
        $id = $request->idTimeframes;

        $rules = [
            'startTime' => 'required',
        ];

        $messages = [
            'required' => ':attribute không được rỗng',
        ];

        $attributes = [
            'startTime' => 'Khung thời gian',
        ];

        $validator =  Validator::make($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $timeframe = Timeframe::find($id);
        $timeframe->start_time = $startTime;
        $timeframe->save();

        return redirect(route('admin.timeframes.list'));
    }

    public function delete($id) {
       $timeframe = Timeframe::destroy($id);

       if($timeframe) {
        return redirect(route('admin.timeframes.list'));
       }
    }
}
