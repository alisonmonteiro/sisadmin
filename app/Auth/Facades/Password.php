<?php

namespace SisAdmin\Auth\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SisAdmin\Auth\Contracts\PasswordBroker
 */
class Password extends Facade
{
    /**
     * Constant representing a successfully sent reminder.
     *
     * @var string
     */
    const RESET_LINK_SENT = 'auth::password.sent';

    /**
     * Constant representing a successfully reset password.
     *
     * @var string
     */
    const PASSWORD_RESET = 'auth::password.reset';

    /**
     * Constant representing the user not found response.
     *
     * @var string
     */
    const INVALID_USER = 'auth::password.user';

    /**
     * Constant representing an invalid password.
     *
     * @var string
     */
    const INVALID_PASSWORD = 'auth::password.password';

    /**
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = 'auth::password.token';

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auth.password';
    }
}
