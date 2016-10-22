<?php

namespace SisAdmin\Users\Http\Controllers;

use SisAdmin\Core\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the dashboard panel.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('users::index');
    }
}
