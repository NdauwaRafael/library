<?php

namespace App\Http\Controllers\Admin;

use Admin\permissions\Permission;
use Admin\Roles\RoleRepository;
use App\Admin\Roles\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->getRoles();

        return view('admin.roles.index', [
            'roles' => $roles
        ]);
    }

    public function getRoles()
    {
        return $this->roleRepository->listRoles();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        if (is_null($id)) {
            $role = new Role();
        } else {
            $role = $this->roleRepository->getRoleById($id);
        }

        return view('admin.roles.create', [
            'role' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->getRoleById($id);

        return view('admin.roles.show', [
            'role' => $role
        ]);
    }

    public function editPermissions(Request $request,$id)
    {

        $permissions = $request->except(['_token']);

        $role = $this->roleRepository->getRoleById($id);

        $rolePermissions = $role->rolePermissions;

        foreach ($rolePermissions as $rolePermission) {
            $rolePermission->delete();
        }

        $this->roleRepository->addPermissions($permissions, $id);

        Flash::success("Role permissions added successfully");

        return redirect('/role/show/' . $role->id);
    }

    public function permissions($id)
    {
        $role = $this->roleRepository->getRoleById($id);

        $role_permissions = $role->rolePermissions->pluck('permission_id');

        $Permissions = Permission::all();

        return view('admin.roles.permissions', [
            'permissions' => $Permissions,
            'role' => $role,
            'role_permissions' => $role_permissions
        ]);
    }
}
