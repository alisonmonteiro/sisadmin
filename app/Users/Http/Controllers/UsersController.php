<?php

namespace SisAdmin\Users\Http\Controllers;

use Auth;
use SisAdmin\Core\Http\Controllers\Controller;
use SisAdmin\Users\Entities\User;

class UsersController extends Controller
{
    /**
     * @var \SisAdmin\Users\Entities\User
     */
    protected $user;

    /**
     * Create a new controller instance.
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Show the users list.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $userId = Auth::user()->id;
        $users = $this->user->where('id', '!=', $userId)->orderBy('name')->paginate(50);

        return view('users::index', [
            'users' => $users,
        ]);
    }
}
