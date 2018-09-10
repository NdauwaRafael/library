<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 07/09/2018
 * Time: 15:18
 */

namespace Admin\Departments;


use App\Admin\Departments\Department;
use App\Http\Controllers\TablePaginate;

class DepartmentRepository
{
    use TablePaginate;
    public function getDepartmentById($id)
    {
        return Department::findOrFail($id);
    }

    public function getDepartmentList()
    {
        $departments = Department::orderBy('name')->get();

        return $departments->map(function ($department) {
            return [
                'value' => $department->id,
                'label' => $department->name,
            ];
        });
    }

    public function save($input)
    {
        return Department::create($input);
    }

    public function listDepartments()
    {
        return $this->tablePaginate(new Department(), [], function ($department) {
            return [
                'name' => $department->name,
            ];
        });
    }
}
