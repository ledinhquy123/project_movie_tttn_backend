<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\ScreenController;
use App\Http\Controllers\Admin\ShowtimeController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\TimeframeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\api\TransactionController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\MailController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::prefix('auth/')->name('auth.')->group(function() {
//     Route::get('google', [SocialController::class, 'googleLogin'])->name('google-login');

//     Route::get('google/callback', [SocialController::class, 'googleCallback'])->name('google-callback');
// });


// Auth::routes();

Route::prefix('admin/')->name('admin.')->group(function() {
  Route::get('/', [DashboardController::class, 'index'])->name('home-page')->middleware('check.login.admin');

  Route::get('login', [LoginController::class, 'login'])->name('login-admin')->middleware('check.access.admin');

  Route::post('login', [LoginController::class, 'handleLogin'])->name('handle-login');

  Route::get('log-out', [LoginController::class, 'handleLogout'])->name('handle-logout');

  // User
  Route::prefix('users')->middleware('check.login.admin')->name('users.')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('list');

    Route::get('create', [UserController::class, 'create'])->name('create');

    Route::post('create', [UserController::class, 'handleCreate'])->name('handleCreate');
    
    Route::get('update/{user}', [UserController::class, 'update'])->name('update');

    Route::post('update', [UserController::class, 'handleUpdate'])->name('handleUpdate');

    Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
  });

  // Movie
  Route::prefix('movies')->middleware('check.login.admin')->name('movies.')->group(function() {
    Route::get('/', [MovieController::class, 'index'])->name('list');

    Route::get('create', [MovieController::class, 'create'])->name('create');

    Route::post('create', [MovieController::class, 'handleCreate'])->name('handleCreate');

    Route::get('update/{movie}', [MovieController::class, 'update'])->name('update');

    Route::post('update', [MovieController::class, 'handleUpdate'])->name('handleUpdate');

    Route::get('delete/{id}', [MovieController::class, 'delete'])->name('delete');
  });

  // Screen
  Route::prefix('screens')->middleware('check.login.admin')->name('screens.')->group(function() {

    Route::get('/', [ScreenController::class, 'index'])->name('list');

    Route::get('create', [ScreenController::class, 'create'])->name('create');

    Route::post('create', [ScreenController::class, 'handleCreate'])->name('handleCreate');

    Route::get('update/{screen}', [ScreenController::class, 'update'])->name('update');

    Route::post('update', [ScreenController::class, 'handleUpdate'])->name('handleUpdate');

    Route::get('delete/{id}', [ScreenController::class, 'delete'])->name('delete');
  });

  // Timeframes
  Route::prefix('timeframes')->middleware('check.login.admin')->name('timeframes.')->group(function() {

    Route::get('/', [TimeframeController::class, 'index'])->name('list');

    Route::get('create', [TimeframeController::class, 'create'])->name('create');

    Route::post('create', [TimeframeController::class, 'handleCreate'])->name('handleCreate');

    Route::get('update/{timeframes}', [TimeframeController::class, 'update'])->name('update');

    Route::post('update', [TimeframeController::class, 'handleUpdate'])->name('handleUpdate');

    Route::get('delete/{id}', [TimeframeController::class, 'delete'])->name('delete');
  });

  // Showtimes
  Route::prefix('showtimes')->middleware('check.login.admin')->name('showtimes.')->group(function() {

    Route::get('/', [ShowtimeController::class, 'index'])->name('list');

    Route::get('create', [ShowtimeController::class, 'create'])->name('create');

    Route::post('create', [ShowtimeController::class, 'handleCreate'])->name('handleCreate');

    Route::get('update/{showtime}', [ShowtimeController::class, 'update'])->name('update');

    Route::post('update', [ShowtimeController::class, 'handleUpdate'])->name('handleUpdate');

    Route::get('delete/{id}', [TimeframeController::class, 'delete'])->name('delete');
  });

  // Tickets
  Route::prefix('tickets')->middleware('check.login.admin')->name('tickets.')->group(function() {

    Route::get('/', [TicketController::class, 'index'])->name('list');

    Route::get('update/{ticket}', [TicketController::class, 'update'])->name('update');

    Route::post('update', [TicketController::class, 'handleUpdate'])->name('handleUpdate');

  });
});