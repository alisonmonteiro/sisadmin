<?php

namespace SisAdmin\Dashboard\Http\Controllers;

use SisAdmin\Core\Http\Controllers\Controller;

class DashboardController extends Controller
{
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
