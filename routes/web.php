<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return redirect('/login');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    return redirect('/user/dashboard');
})->middleware('auth');


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {

        // Concursos
        Route::get('contests', [ContestController::class, 'index'])->name('contests.index');
        Route::get('contests/create', [ContestController::class, 'create'])->name('contests.create');
        Route::post('contests', [ContestController::class, 'store'])->name('contests.store');
        Route::get('contests/{id}/edit', [ContestController::class, 'edit'])->name('contests.edit');
        Route::put('contests/{id}', [ContestController::class, 'update'])->name('contests.update');
        Route::delete('contests/{id}', [ContestController::class, 'destroy'])->name('contests.destroy');

        // Participantes
        Route::get('contests/{id}/participants', [ParticipationController::class, 'index'])
            ->name('contests.participants');

        // Premios
        Route::get('contests/{id}/prize', [PrizeController::class, 'create'])
            ->name('contests.prize');
        Route::post('contests/{id}/prize', [PrizeController::class, 'store'])
            ->name('contests.assignPrize');
    });

// Acceso protegido a la gestión de usuarios
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
Route::post('/admin/users/access', [AdminUserController::class, 'checkAccess'])->name('admin.users.access');

// CRUD usuarios
Route::post('/admin/users/create', [AdminUserController::class, 'store'])->name('admin.users.store');
Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

Route::get('/admin/metrics', [AdminController::class, 'metrics'])
    ->name('admin.metrics')
    ->middleware('auth'); // o auth + admin si tienes middleware de admin


});


Route::middleware(['auth', 'role:user'])->group(function () {
    
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
});

Route::middleware(['auth', 'role:user'])->get('/my-results', function () {
    $user = auth()->user();

    $prizes = \App\Models\Prize::with('contest')
        ->where('winner_user_id', $user->id)
        ->get();

    return view('user.results', compact('prizes'));
});


Route::get('/contests', [ContestController::class, 'list']);
Route::post('/contests/{id}/participate', [ParticipationController::class, 'store']);
});


Route::middleware(['auth'])->get('/notifications', [NotificationController::class, 'index']);