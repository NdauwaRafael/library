<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 07/09/2018
 * Time: 15:17
 */

namespace Admin\Users;


use App\Admin\Users\User;
use App\Http\Controllers\TablePaginate;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    use TablePaginate;
    public function save($input)
    {
        return User::create([
           'password' => Hash::make(str_random(8)),
           'created_by' => $input['created_by'],
           'username' => $input['username'],
           'firstname' => $input['firstname'],
           'lastname' => $input['lastname'],
           'email' => $input['email'],
           'department_id' => $input['department_id'],
           'role_id' => $input['role_id'],
        ]);
    }

    public function listUsers()
    {
        return $this->tablePaginate(new User(), [], function ($user) {
            return  [
                'name' => $user->present()->fullName,
                'email' => $user->email,
                'phone' => $user->phone,
                'role' =>  $user->role->name,
                'id' => $user->id
            ];
        });
    }
}
