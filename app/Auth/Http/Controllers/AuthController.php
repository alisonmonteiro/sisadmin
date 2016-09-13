<?php

namespace SisAdmin\Auth\Http\Controllers;

use SisAdmin\Auth\Traits\AuthenticatesUsers;
use SisAdmin\Core\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectPath = 'admin';

    /**
     * Path to the login route.
     *
     * @var string
     */
    protected $loginPath = 'admin/auth';

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
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
}
