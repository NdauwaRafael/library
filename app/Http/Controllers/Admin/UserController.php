<?php

namespace App\Http\Controllers\Admin;

use Admin\Departments\DepartmentRepository;
use Admin\Roles\RoleRepository;
use Admin\Users\UserRepository;
use App\Mail\SendUserActivationLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
