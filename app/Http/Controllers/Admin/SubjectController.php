<?php

namespace App\Http\Controllers\Admin;

use Admin\Subjects\SubjectRepository;
use Admin\Subjects\SubjectRules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    use SubjectRules;

    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
       $this->subjectRepository = $subjectRepository;
    }
    public function store(Request $request)
    {
        $validation = $this->createSubject($request);

        if ($validation) {
            return response()->json([
                'success' => false,
                'message' => 'There are errors in the form',
                'error' => $validation->messages()->getMessages()
            ]);
        }

        $this->subjectRepository->save($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Created successfully.'
        ]);
    }

    public function getSubjects()
    {
        return $this->subjectRepository->listSubjects();
    }

    public function index()
    {
        $subjects = $this->subjectRepository->getSubjectsList();

        return [
            'fetched' => true,
            'data' => $subjects
        ];
    }
}
