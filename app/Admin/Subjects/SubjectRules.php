<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 10/09/2018
 * Time: 12:29
 */

namespace Admin\Subjects;


use App\Rules\Rules;

trait SubjectRules
{
    use Rules;

    public function createSubject($request)
    {
        $rules = [
            'name' => 'required',
        ];

        return $this->verdict($request, $rules);
    }

    public function updateSubject($request, $id)
    {
        $rules = [
            'name' => 'required',
        ];

        return $this->verdict($request, $rules);
    }
}
