<?php

namespace SisAdmin\Auth\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use SisAdmin\Core\Http\Controllers\Controller;

class PasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return \SisAdmin\Auth\Http\Controllers\PasswordController
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware());
    }
}
