<?php

namespace SisAdmin\Users\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
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
class User extends Authenticatable
{
    use Uuids;

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
}
