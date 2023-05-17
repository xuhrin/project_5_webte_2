<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ManualController extends Controller
{
    //

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('manual');
    }

    // Called first time to set role
    public function download()
    {
        $pdf = Pdf::loadView('content.manual', ['pdf' => true, 'locale' => app()->getLocale()]);
        return $pdf->download('manual_' . app()->getLocale() . '.pdf');
    }
}
