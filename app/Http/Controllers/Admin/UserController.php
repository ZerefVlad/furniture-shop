<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $user_service;

    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
        $this->middleware('auth');
    }

    public function index()
    {
        $users = $this->user_service->getUsers();
        $roles = $this->user_service->getRoles();

        return view('admin.user.user_list')->with('users', $users)
            ->with('roles', $roles);
    }

    public function createUser(UserCreateRequest $request)
    {
        $this->user_service->createUser($request->all());
        Session::flash('user_create_success', 'Юхер успешно создан');

        return back();
    }

    public function deleteUser($id)
    {
        $this->user_service->deleteUser($id);
        Session::flash('user_delete_success', 'Юхер успешно deleted');

        return back();
    }

    public function editUser($id, UserCreateRequest $request)
    {
        $this->user_service->editUser($id, $request->all());
        Session::flash('user_edit_success', 'Юхер успешно changed');

        return back();
    }

    public function  userActionCreate(Request $request)
    {
        return view('admin.user.user_create')
            ->with('action', 'create')
            ->with('user', null);
    }

    public function  userActionEdit($id, $name, Request $request)
    {
        $user = $id ? $this->user_service->getUser($id) : null;

        return view('admin.user.user_create')
            ->with('action', 'edit')
            ->with('id', $id)
            ->with('user', $user);
    }

    public function changeRole($id, Request $request)
    {
        $this->user_service->changeUserRole($id, $request->get('role_id'));
        Session::flash('user_edit_role_success', 'Юхер успешно changed role');


        return back();
    }
}
