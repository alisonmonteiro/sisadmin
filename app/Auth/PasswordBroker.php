<?php

namespace SisAdmin\Auth;

use Closure;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use SisAdmin\Auth\Contracts\PasswordBroker as PasswordBrokerContract;

class PasswordBroker extends \Illuminate\Auth\Passwords\PasswordBroker
{
    /**
     * Send a password reset link to a user.
     *
     * @param  array $credentials
     * @param  \Closure|null $callback
     * @return string
     */
    public function sendResetLink(array $credentials, Closure $callback = null)
    {
        // First we will check to see if we found a user at the given credentials and
        // if we did not we will redirect back to this current URI with a piece of
        // "flash" data in the session to indicate to the developers the errors.
        $user = $this->getUser($credentials);

        if (is_null($user)) {
            return PasswordBrokerContract::INVALID_USER;
        }

        // Once we have the reset token, we are ready to send the message out to this
        // user with a link to reset their password. We will then redirect back to
        // the current URI having nothing set in the session to indicate errors.
        $token = $this->tokens->create($user);

        $this->emailResetLink($user, $token, $callback);

        return PasswordBrokerContract::RESET_LINK_SENT;
    }

    /**
     * Reset the password for the given token.
     *
     * @param  array $credentials
     * @param  \Closure $callback
     * @return mixed
     */
    public function reset(array $credentials, Closure $callback)
    {
        // If the responses from the validate method is not a user instance, we will
        // assume that it is a redirect and simply return it from this method and
        // the user is properly redirected having an error message on the post.
        $user = $this->validateReset($credentials);

        if (!$user instanceof CanResetPasswordContract) {
            return $user;
        }

        $pass = $credentials['password'];

        // Once we have called this callback, we will remove this token row from the
        // table and return the response from this callback so the user gets sent
        // to the destination given by the developers from the callback return.
        call_user_func($callback, $user, $pass);

        $this->tokens->delete($credentials['token']);

        return PasswordBrokerContract::PASSWORD_RESET;
    }

    /**
     * Validate a password reset for the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Contracts\Auth\CanResetPassword
     */
    protected function validateReset(array $credentials)
    {
        if (is_null($user = $this->getUser($credentials))) {
            return PasswordBrokerContract::INVALID_USER;
        }

        if (!$this->validateNewPassword($credentials)) {
            return PasswordBrokerContract::INVALID_PASSWORD;
        }

        if (!$this->tokens->exists($user, $credentials['token'])) {
            return PasswordBrokerContract::INVALID_TOKEN;
        }

        return $user;
    }
}
