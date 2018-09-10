<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 10/09/2018
 * Time: 12:26
 */

namespace Admin\Subjects;


use App\Admin\Subjects\Subject;
use App\Http\Controllers\TablePaginate;

class SubjectRepository
{
    use TablePaginate;

    public function getSubjectById($id)
    {
        return Subject::findOrFail($id);
    }

    public function save($input)
    {
        return Subject::create($input);
    }

    public function listSubjects()
    {
        return $this->tablePaginate(new Subject(), [], function ($subject) {
            return [
                'name' => $subject->name,
            ];
        });
    }
}
