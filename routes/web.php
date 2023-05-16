<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
})->name('welcome');

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

// Authentication

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/select/{role}', [HomeController::class, 'select'])->name('home.select');

Route::group(['middleware' => ['auth']], function () {
    // Route::resource('/users', UserController::class);
});
