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
    $locale = Session::get('locale', 'sk');
    App::setLocale($locale);
    return view('home');
});

Route::get('/language/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'sk'])) {
        abort(400);
    }

    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('language');

// Route::middleware(['auth'])->group(function () {
//     Route::resource('roles', RoleController::class);
// });
