<?php

namespace SisAdmin\Users\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use SisAdmin\Core\Traits\Uuids;

/**
 * SisAdmin\Users\Entities\User
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property boolean $active
 * @property boolean $role
 * @property string $expires_date
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\SisAdmin\Users\Entities\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\SisAdmin\Users\Entities\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\SisAdmin\Users\Entities\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\SisAdmin\Users\Entities\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\SisAdmin\Users\Entities\User whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\SisAdmin\Users\Entities\User whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|\SisAdmin\Users\Entities\User whereExpiresDate($value)
 * @method static \Illuminate\Database\Query\Builder|\SisAdmin\Users\Entities\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\SisAdmin\Users\Entities\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SisAdmin\Users\Entities\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'role',
        'expires_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get all of the models from the database.
     *
     * @param  array|mixed $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function all($columns = ['*'])
    {
        return self::orderBy('created_at')->get($columns);
    }
}
