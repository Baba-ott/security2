<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DogController;
use App\Models\User;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;




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
Route::get('/user/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('user.make-admin');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile', [ProfileController::class, 'showProfile']);






Route::get('/makeAdmin/{id}', [UserController::class, 'makeAdmin'])->name('makeAdmin');

Route::get("/dogs", [DogController::class, 'index'])->name('dogs.index');
Route::get("/dogs/create", [DogController::class, 'create'])->name('dogs.create');
Route::post('/dogs', [DogController::class, 'store'])->name('dogs.store');
Route::get('/dogs/{id}', [DogController::class, 'show'])->name('dogs.show');
Route::get('/dogs/{id}/edit', [DogController::class, 'edit'])->name('dogs.edit');
Route::put('/dogs/{id}', [DogController::class, 'update'])->name('dogs.update');
Route::delete('/dogs/{id}', [DogController::class, 'destroy'])->name('dogs.destroy');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin')->name('admin');

Route::post('/make-admin/{user}', [UserController::class, 'makeAdmin'])->name('make.admin');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/admin', [UserController::class, 'someMethod']);



Route::get('/dashboard', function () {
    $users = User::all();
    return view('dashboard', ['users' => $users]);
})->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/user', function () {
        // Your code here
    });
});

Route::get('/admin', function () {
    // make sure the user is admin before returning the view
    if (Auth::user() && Auth::user()->is_admin) {
        return view('admin');
    } else {
        return redirect('/')->with('error', 'You do not have access to this page.');
    }
})->name('admin');
require __DIR__.'/auth.php';
