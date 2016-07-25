<?php

namespace SisAdmin\Core\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the application's homepage
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('welcome');
    }
}
