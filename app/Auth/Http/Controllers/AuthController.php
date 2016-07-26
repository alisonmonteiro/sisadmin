<?php

namespace SisAdmin\Auth\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use SisAdmin\Core\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin';

    /**
     * The login form view.
     *
     * @var string
     */
    protected $loginView = 'auth::login';

    /**
     * Create a new authentication controller instance.
     *
     * @return \SisAdmin\Auth\Http\Controllers\AuthController
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
}