<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 10/09/2018
 * Time: 12:13
 */

namespace Admin\Departments;


use App\Rules\Rules;

trait DepartmentRules
{
    use Rules;

    public function createDepartment($request)
    {
        $rules = [
            'name' => 'required',
        ];

        return $this->verdict($request, $rules);
    }

    public function updateDepartment($request, $id)
    {
        $rules = [
            'name' => 'required',
        ];

        return $this->verdict($request, $rules);
    }
}
