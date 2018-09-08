<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 31/05/2018
 * Time: 12:54
 */

namespace App\General\Authorize;

use Admin\permissions\Permission;
use Admin\permissions\RolePermission;
use App\General\Authorize\Exceptions\AuthorizationFailedException;
use Illuminate\Support\Facades\Auth;

trait Authorization
{
    public function hasPermission($permissionName)
    {
        $permission = Permission::where('name', $permissionName)->first();

        if (! $this->hasPermissionFor($permission)) {
            throw new AuthorizationFailedException($permission->description);
        }

        return true;
    }

    public function booleanHasPermission($permissionName)
    {
        $permission = Permission::where('name', $permissionName)->first();

        if (! $permission) {
            return false;
        }

        if (! $this->hasPermissionFor($permission)) {
            return false;
        }

        return true;
    }

    public function hasNoPermissionResponse($permissionName)
    {
        $permission = Permission::where('name', $permissionName)->first();

        if (! $permission) {
            return [
                'success'    =>  false,
                'message'       =>  'Unknown Permission: '. strtolower(preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', $permissionName))
            ];
        }

        return [
            'success'    =>  false,
            'message'       =>  'Access Denied: You cannot '. strtolower($permission->description)
        ];
    }

    public function checkHasPermission($permissionName)
    {
        $permission = Permission::where('name', $permissionName)->first();

        return $this->hasPermissionFor($permission);
    }

    public function hasPermissionFor($permission)
    {
        if ($this->roleHasPermission($permission->id, Auth::user()->role_id)) {
            return true;
        }
        return false;
    }

    public function roleHasPermission($permissionId, $roleId)
    {
        $rolePermission = RolePermission::where('role_id', $roleId)->where('permission_id', $permissionId)->first();

        return ! is_null($rolePermission);
    }
}
