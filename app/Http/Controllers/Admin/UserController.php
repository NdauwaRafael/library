<?php

namespace App\Http\Controllers\Admin;

use Admin\Departments\DepartmentRepository;
use Admin\Roles\RoleRepository;
use Admin\Users\UserRepository;
use App\Admin\Users\User;
use App\Mail\SendUserActivationLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->getRolesList();

        $departments = $this->departmentRepository->getDepartmentList();

        return view('admin.users.create', [
            'roles' => $roles,
            'departments' => $departments
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
        $user = $this->userRepository->save($request->all());

        Mail::to($user->email)->queue(new SendUserActivationLink($user));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view('admin.users.view');
    }

    public function getUsers()
    {
        return $this->userRepository->listUsers();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
