<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Exception\ClientException;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    // public function googleLogin() {
    //     return Socialite::driver('google')->redirect();
    // }

    public function googleLogin() {
        return response()->json([
            'url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl()
        ]);
    }

    public function googleCallback() {
        $user = Socialite::driver('google')->stateless()->user();
        $access_token = $user->token;
        $provider_id = $user->getId();
        $name = $user->getName();
        $email = $user->getEmail();
        $avatar = $user->getAvatar();

        if($provider_id) {
            $user = User::where('provider_id', $provider_id)->first();

            if(!$user) {
                $user = new User;
                $user->name = $name;
                $user->email = $email;
                $user->provider_id = $provider_id;
                $user->provider = 'google';
                $user->avatar = $avatar;
                $user->access_token = $access_token;
                $user->group_id = 1;
                $user->save();
            }

            return response()->json([
                'user' => $user
            ]);
        }
        return response()->json([
            'user' => null
        ]);
    }

    // public function googleCallback() {
    //     $user = Socialite::driver('google')->user();
    //     dd($user);
    // }

    // App 
    public function appGoogleSignIn(Request $request) {
        $access_token = $request->input('access_token');
        $provider_id = $request->input('provider_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $avatar = $request->input('avatar');

        if($provider_id) {
            $user = User::where('provider_id', $provider_id)->first();

            if(!$user) {
                $user = new User;
                $user->name = $name;
                $user->email = $email;
                $user->provider_id = $provider_id;
                $user->provider = 'google';
                $user->avatar = $avatar;
                $user->access_token = $access_token;
                $user->group_id = 1;
                $user->save();
            }

            return response()->json([
                'user' => $user
            ]);
        }
        return response()->json([
            'user' => null
        ]);
    }
}
