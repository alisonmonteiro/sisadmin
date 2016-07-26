<?php

namespace SisAdmin\Users\Repositories;

use SisAdmin\Users\Entities\User;

class UserRepository extends User
{
    /**
     * Get all of the models from the database.
     *
     * @param  array|mixed $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function all($columns = ['*'])
    {
        return parent::orderBy('created_at')->get($columns);
    }
}
