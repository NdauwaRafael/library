<?php

namespace App\Http\Controllers\Admin;

use Admin\Departments\DepartmentRepository;
use Admin\Roles\RoleRepository;
use Admin\Users\UserRepository;
use App\Mail\SendUserActivationLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
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

        return redirect()->back();
    }

    public function show($id)
    {
        return view('admin.users.view');
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
}
