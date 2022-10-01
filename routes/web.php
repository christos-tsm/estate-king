<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Teamwork\TeamController;
use App\Http\Controllers\Teamwork\TeamMemberController;
use App\Http\Controllers\Teamwork\AuthController;
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


/**
 * Teamwork routes
 */
Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function () {
    Route::get('/', [TeamController::class, 'index'])->name('teams.index');
    Route::get('create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('edit/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('destroy/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('switch/{id}', [TeamController::class, 'switchTeam'])->name('teams.switch');

    Route::get('members/{id}', [TeamMemberController::class, 'show'])->name('teams.members.show');
    Route::get('members/resend/{invite_id}', [TeamMemberController::class, 'resendInvite'])->name('teams.members.resend_invite');
    Route::get('members/deny/{invite_id}', [TeamMemberController::class, 'denyInvite'])->name('teams.members.deny_invite');
    Route::post('members/{id}', [TeamMemberController::class, 'invite'])->name('teams.members.invite');
    Route::delete('members/{id}/{user_id}', [TeamMemberController::class, 'destroy'])->name('teams.members.destroy');

    Route::get('accept/{token}', [AuthController::class, 'acceptInvite'])->name('teams.accept_invite');
});
