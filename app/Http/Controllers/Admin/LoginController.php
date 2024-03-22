<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login() {
        return view('admin.login');
    }

    public function handleLogin(Request $request) {

        $email = $request->email;
        $password = $request->password;
        if($email && $password) {
            $user = User::where('email', $email)
            ->where('group_id', 2)
            ->get();
            if($user->count() > 0) {
                $result = null;
                foreach($user as $item) {
                    if($item->password) {
                        $result = $item;
                        break;
                    }
                }
                if($result) {
                    $status = Hash::check($password, $result->password) ? 1 : 0;
                    if($status) return redirect(route('admin.home-page'))->withCookie(cookie('user', json_encode($result), 60));
                    else return back()->withErrors('password', 'Mật khẩu không đúng');
                }
            }
            return back();
        }else{
            return back();
        }

    }

    public function handleLogout() {
        return redirect(route('admin.login-admin'))->withCookie(Cookie::forget('user'));
    }
}
