<?php

namespace SisAdmin\Dashboard\Http\Controllers;

use SisAdmin\Core\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \SisAdmin\Dashboard\Http\Controllers\DashboardController
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the dashboard panel
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('dashboard::index');
    }
}
