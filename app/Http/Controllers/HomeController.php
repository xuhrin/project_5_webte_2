<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // Called first time to set role
    public function select(string $role) {
        if (!in_array($role, ['student', 'teacher'])) {
            abort(400);
        }

        if (auth()->getUser()->hasRole(['student', 'teacher'])) {
            abort(400);
        }

        auth()->getUser()->assignRole($role);
        return redirect()->intended('home'); // TODO: Set status
    }
}
