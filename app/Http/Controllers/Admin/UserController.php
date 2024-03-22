<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Danh sách người dùng
    public function index() {
        $users = User::where('group_id', 1)->get();
        $user = json_decode(Cookie::get('user'), true);
        return view('admin.users.list', compact(['users', 'user']));
    }

    // Thêm người dùng
    public function create() {
        $user = json_decode(Cookie::get('user'), true);
        $groups = Group::all();
        return view('admin.users.add', compact(['user', 'groups'])); 
    }

    public function handleCreate(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $avatar = $request->avatar;
        $group_id = $request->group;

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'avatar' => 'required',
        ];

        $messages = [
            'required' => ':attribute không được rỗng',
            'email' => ':attribute không đúng định dạng email',
            'min' => ':attribute tối thiểu :min kí tự'
        ];

        $attributes = [
            'name' => 'Tên người dùng',
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
            'avatar' => 'Link ảnh đại diện'
        ];

        $validator =  Validator::make($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'avatar' => $avatar,
            'group_id' => $group_id
        ]);

        if($user) return redirect(route('admin.users.list'));
    }

    // Cập nhật người dùng
    public function update(User $user) {
        return view('admin.users.update', compact('user'));
    }

    public function handleUpdate(Request $request) {
        $userId = $request->id;
        $name = $request->name;
        $email = $request->email;
        $avatar = $request->avatar;

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'avatar' => 'required'
        ];

        $messages = [
            'required' => ':attribute không được rỗng',
            'email' => ':attribute không đúng định dạng email'
        ];

        $attributes = [
            'name' => 'Tên người dùng',
            'email' => 'Địa chỉ email',
            'avatar' => 'Ảnh đại diện'
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::find($userId);
        $user->name = $name;
        $user->email = $email;
        $user->avatar = $avatar;
        $user->save();

        return redirect(route('admin.users.list'));
    }

    public function delete($id) {
        if(User::destroy($id)) {
            return redirect(route('admin.users.list'));
        }
    }
}
