<?php

namespace SisAdmin\Auth\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use SisAdmin\Core\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * Create a new password controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->subject = trans('auth::form.reset');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmail()
    {
        return view('auth::passwords.email');
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $token
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getReset(Request $request, $token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        return view('auth::passwords.reset')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }
}
