<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Screen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class ScreenController extends Controller
{
    public function index() {
        $user = json_decode(Cookie::get('user'), true);
        $screens = Screen::orderBy('created_at', 'desc')->get();
        return view('admin.screens.list', compact(['user', 'screens']));
    }

    public function create() {
        $user = json_decode(Cookie::get('user'), true);
        return view('admin.screens.add', compact(['user']));
    }

    public function handleCreate(Request $request) {
        $name = $request->name;

        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'required' => ':attribute không được rỗng',
        ];

        $attributes = [
            'name' => 'Tên phòng',
        ];

        $validator =  Validator::make($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $screen = Screen::create([
            'name' => $name
        ]);
        if($screen) return redirect()->route('admin.screens.list');
    }

    public function update(Screen $screen) {
        $user = json_decode(Cookie::get('user'), true);
        return view('admin.screens.update', compact('user', 'screen'));
    }

    public function handleUpdate(Request $request) {
        $id = $request->idScreen;
        $name = $request->name;

        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'required' => ':attribute không được rỗng',
        ];

        $attributes = [
            'name' => 'Tên phòng',
        ];

        $validator =  Validator::make($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $screen = Screen::find($id);
        $screen->name = $name;
        $screen->save();
        if($screen) return redirect()->route('admin.screens.list');
    }

    public function delete($id) {
        $screen = Screen::destroy($id);
        if($screen) return redirect()->route('admin.screens.list');
    }
}
