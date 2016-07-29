<?php

namespace SisAdmin\Auth\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use SisAdmin\Core\Http\Controllers\Controller;

class PasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * The reset password email subject.
     *
     * @var string
     */
    protected $subject;

    /**
     * Where to redirect users after password reset.
     *
     * @var string
     */
    protected $redirectTo = 'admin';

    /**
     * The view with the request password form.
     *
     * @var string
     */
    protected $linkRequestView = 'auth::passwords.email';

    /**
     * The view with the create new password form.
     *
     * @var string
     */
    protected $resetView = 'auth::passwords.reset';

    /**
     * Create a new password controller instance.
     *
     * @return \SisAdmin\Auth\Http\Controllers\PasswordController
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware());

        $this->subject = trans('auth::form.reset');
    }
}
