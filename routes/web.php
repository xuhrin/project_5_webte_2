<?php

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

// Routes to views

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/user', function () {
    return view('user.form');
})->name('user-form');

Route::get('/manual', function () {
    return view('manual');
})->name('manual');

// Route for language change

Route::get('/language/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'sk'])) {
        abort(400);
    }

    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('language');

// Other

Route::post('/login', function () {
    return redirect()->back();
})->name('login');

Route::post('/register', function () {
    return redirect()->back();
})->name('register');


// Route::middleware(['auth'])->group(function () {
//     Route::resource('roles', RoleController::class);
// });
