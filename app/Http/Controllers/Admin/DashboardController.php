<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index() {
        $user = json_decode(Cookie::get('user'), true);
        $movies = Movie::all();
        $users = User::all();

        $tickets = Ticket::whereMonth('created_at', Carbon::now()->month)
        ->sum('total_price');
        $screens = Screen::all();

        return view('admin.dashboard', compact(['user', 'movies', 'users', 'tickets', 'screens']));
    }
}
