<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 07/09/2018
 * Time: 15:18
 */

namespace Admin\Departments;


use App\Admin\Departments\Department;

class DepartmentRepository
{
    public function getDepartmentList()
    {
        $departments = Department::orderBy('name')->get();

        return $departments->map(function ($department){
            return [
                'value' => $department->id,
                'label' => $department->name,
            ];
        });
    }
}
