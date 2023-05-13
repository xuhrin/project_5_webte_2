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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    if (App::isLocale('sk')) {
        return redirect('/home/sk');
    }
    return redirect('/home/en');
});

Route::get('/home/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'sk'])) {
        abort(400);
    }

    App::setlocale($locale);
    return view('home');
});
