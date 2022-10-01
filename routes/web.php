<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/agents', function () {
    return view('agents');
})->middleware(['auth', 'verified'])->name('agents');



Route::middleware(['auth', 'verified'])->group(function () {

    // Route::group(['prefix' => '/dashboard', 'as' => 'dashboard'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/agents', function () {
        return view('agents');
    })->name('agents');

    Route::get('/dashboard/reports', function () {
        return view('reports');
    })->name('reports');

    Route::get('/dashboard/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/dashboard/support', function () {
        return view('support');
    })->name('support');


    Route::get('/dashboard/profile', [UserController::class, 'index'])->name('profile');
    Route::put('/dashboard/profile', [UserController::class, 'update'])->name('profile.update');
});


require __DIR__ . '/auth.php';
