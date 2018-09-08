<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 07/09/2018
 * Time: 15:18
 */

namespace Admin\Roles;


use App\Admin\Roles\Role;
use App\Http\Controllers\TablePaginate;

class RoleRepository
{
    use TablePaginate;

    public function getRoleById($id)
    {
     return Role::findOrFail($id);
    }
    public function getRolesList()
    {
        $roles = Role::orderBy('name')->get();

        return $roles->map(function ($role) {
            return [
                'value' => $role->id,
                'label' => $role->name,
            ];
        });
    }

    public function listRoles()
    {
        return $this->tablePaginate(new Role(), [], $this->universalTransformer());
    }
}
