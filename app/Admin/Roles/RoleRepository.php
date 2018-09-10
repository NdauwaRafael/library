<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 07/09/2018
 * Time: 15:18
 */

namespace Admin\Roles;


use Admin\permissions\RolePermission;
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

    public function addPermissions($permissions, $id)
    {
        $role = $this->getRoleById($id);

        $rolePermissions = $role->rolePermissions()->get();

        foreach (array_keys($permissions) as $permission) {
            if ($rolePermissions->contains('permission_id', $permission)) {
                RolePermission::where('permission_id', $permission)->restore();
            } else {
                RolePermission::create([
                    'role_id' => $role->id,
                    'permission_id' => $permission
                ]);
            }
        }
    }

    public function save($input)
    {
        return Role::create($input);
    }
}
