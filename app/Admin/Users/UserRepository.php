<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 07/09/2018
 * Time: 15:17
 */

namespace Admin\Users;


use App\Admin\Roles\Role;
use App\Admin\Users\User;
use App\Http\Controllers\TablePaginate;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    use TablePaginate;

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function save($input)
    {
        $role = Role::where('name','Student')->first();

        return User::create([
            'password' => Hash::make($input['password']),
            'created_by' => $input['created_by'],
            'username' => $input['username'],
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'department_id' => $input['department_id'],
            'role_id' => $role->id,
        ]);
    }

    public function listUsers()
    {
        return $this->tablePaginate(new User(), [], function ($user) {
            return  [
                'name' => $user->present()->fullName,
                'email' => $user->email,
                'phone' => $user->phone,
                'role' => $user->role->name,
                'id' => $user->id
            ];
        });
    }
}
