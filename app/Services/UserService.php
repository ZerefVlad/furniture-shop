<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.12.18
 * Time: 19:49
 */

namespace App\Services;


use App\Models\Role;
use App\Models\User;

class UserService
{
    const CUSTOMER_ID = 3;

    public function getUsers()
    {
        return User::all();
    }

    public function getUserRole(int $user_id)
    {
        $user = User::find($user_id);

        return $user->roles()->first();
    }

    public function changeUserRole(int $user_id, int $role_id)
    {
        $user = $this->getUser($user_id);
        $user->roles()->detach();
        $user->roles()->attach(Role::find($role_id));
    }

    public function getRoles()
    {
        return Role::all();
    }

    public function getUser(int $user_id)
    {
        return User::find($user_id);
    }

    public function createUser(array $user_data)
    {
        $user = User::create([
            'name' => $user_data['name'],
            'email' => $user_data['email'],
            'surname' => $user_data['surname'],
            'password' => bcrypt($user_data['password'])
        ]);

        $user->roles()->attach(Role::find(self::CUSTOMER_ID));

        return $user;
    }

    public function editUser(int $user_id, array $user_data): void
    {
        $user = User::find($user_id);
        $user->update([
            'name' => $user_data['name'],
            'email' => $user_data['email'],
            'surname' => $user_data['surname'],
            'password' => bcrypt($user_data['password'])
        ]);
    }

    public function deleteUser(int $user_id)
    {
        User::find($user_id)->delete();
    }

}