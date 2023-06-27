<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register;
use App\Http\Controllers\Task;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Log;

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

Route::get('/', function () {
    $user = Auth::guard()->user();
    return view('home', compact('user'));
})->name('home');

Route::get('login', [Login::class, 'index'])->name('login');
Route::post('login/process',[Login::class, 'login'])->name('login.process');

Route::get('register', [Register::class, 'index'])->name('register');
Route::post('register', [Register::class, 'register'])->name('registerp');
Route::get('register/success', [Register::class, 'success'])->name('success');

Route::middleware(['auth'])->group(function () {
    Route::get('/Dashboard', [Dashboard::class, 'index'])->name('logins');
});
Route::post('/logout', function () {
    // This code will be executed because the route accepts POST requests.
    Auth::logout();
    return redirect('/');
})->middleware('auth')->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
});

Route::post('/dashboard/update/{id}',[Dashboard::class, 'update'])->name('role.update');

Route::get('/tasks',[Task::class, 'index','whereHasGroup'])->middleware('auth')->name('task.index');
Route::get('/tasks/complete/{id}',[Task::class, 'complete'])->middleware('auth')->name('task.complete');
Route::get('/logs',[Log::class, 'index'])->middleware('auth')->name('log.index');


Route::post('/tasks/createTask', [Dashboard::class, 'store'])->middleware('auth')->name('create.task');
Route::post('logs/export', [Log::class, 'export'])->middleware('auth')->name('logs.export');
