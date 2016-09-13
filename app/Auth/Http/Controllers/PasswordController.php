<?php

namespace SisAdmin\Auth\Http\Controllers;

use SisAdmin\Auth\Traits\ResetsPasswords;
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
    protected $redirectPath = 'admin';

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
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->subject = trans('auth::form.reset');
    }
}
