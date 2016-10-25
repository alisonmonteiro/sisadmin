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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        return view('users::create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getEdit($id)
    {
        $user = $this->user->find($id);

        if ($user) {
            return view('users::edit', ['user' => $user]);
        }

        return redirect('admin/users')->with([
            'alert' => [
                'type' => 4,
                'message' => 'Usuário não encontrado.',
            ],
        ]);
    }
}
