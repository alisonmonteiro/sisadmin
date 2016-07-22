<?php

namespace SisAdmin\Core\Http\Controllers;

class HomeController extends Controller
{
    public function getIndex()
    {
        return view('welcome');
    }
}
