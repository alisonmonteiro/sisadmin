<?php

namespace SisAdmin\Auth\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
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
     * Route to redirect after logout.
     *
     * @var string
     */
    protected $redirectAfterLogout = 'admin';

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

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required|email',
            'password' => 'required',
        ]);
    }
}
