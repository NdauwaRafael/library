<?php

namespace App\Http\Controllers\Admin;

use Admin\Departments\DepartmentRepository;
use Admin\Departments\DepartmentRules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    use DepartmentRules;

    protected $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository=$departmentRepository;
    }

    public function store(Request $request)
    {
        $validation = $this->createDepartment($request);

        if ($validation) {
            return response()->json([
                'success' => false,
                'message' => 'There are errors in the form',
                'error' => $validation->messages()->getMessages()
            ]);
        }

        $this->departmentRepository->save($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Created successfully.'
        ]);
    }

    public function getDepartments()
    {
        return $this->departmentRepository->listDepartments();
    }
}
