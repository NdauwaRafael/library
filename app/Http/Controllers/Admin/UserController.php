<?php

namespace App\Http\Controllers\Admin;

use Admin\Departments\DepartmentRepository;
use Admin\Roles\RoleRepository;
use Admin\Users\UserRepository;
use App\General\Authorize\Authorization;
use App\Mail\SendUserActivationLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    use Authorization;

    public $departmentRepository, $roleRepository, $userRepository;

    public function __construct(DepartmentRepository $departmentRepository, RoleRepository $roleRepository,
                                UserRepository $userRepository)
    {
        $this->departmentRepository = $departmentRepository;
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->listUsers();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function getUserById($id)
    {
        return response()->json($this->userRepository->getUserById($id));
    }

    public function create()
    {
        $roles = $this->roleRepository->getRolesList();

        $departments = $this->departmentRepository->getDepartmentList();

        return view('admin.users.create', [
            'roles' => $roles,
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {
        $user = $this->userRepository->save($request->all());

        Mail::to($user->email)->queue(new SendUserActivationLink($user));

        return View('Auth.login');
    }

    public function show($id)
    {
        $user = $this->userRepository->getUserById($id);

        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    public function getUsers()
    {
        return $this->userRepository->listUsers();
    }

    public function resetPassword(Request $request, $id)
    {
        $this->userRepository->getUserById($id)->update($request->all());

        return view('/login');
    }

    public function checkPermission($permissionName)
    {
        return response()->json($this->booleanHasPermission($permissionName));
    }
}
