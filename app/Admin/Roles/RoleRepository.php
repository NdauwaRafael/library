<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 07/09/2018
 * Time: 15:18
 */

namespace Admin\Roles;


use App\Admin\Roles\Role;

class RoleRepository
{
    public function getRolesList()
    {
        $roles = Role::orderBy('name')->get();

        return $roles->map(function ($role){
           return [
               'value' => $role->id,
               'name' => $role->name,
           ];
        });
    }
}
