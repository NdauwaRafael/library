<?php

namespace App\Http\Controllers\Book;

use App\Book\BookRepository;
use App\Book\BookRules;
use App\Mail\SendApprovedBookRequestMail;
use App\Mail\SendRequestBookMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    use BookRules;

    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        return $this->bookRepository->getBooks();
    }

    public function store(Request $request)
    {
        $validation = $this->createBook($request);

        if ($validation) {
            return response()->json([
                'success' => false,
                'message' => 'There are errors in the form',
                'error' => $validation->messages()->getMessages()
            ]);
        }

        $this->bookRepository->save($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Created successfully.'
        ]);
    }

    public function reserveBook(Request $request)
    {
       $book = $this->bookRepository->saveReserve($request->all());

       Mail::to('libray@library.com')->queue(new SendRequestBookMail($book));

        return response()->json([
            'success' => true,
            'message' => 'Created successfully.'
        ]);
    }

    public function show($id)
    {
        return response()->json($this->bookRepository->getBookById($id));
    }

    public function approveBook(Request $request)
    {
        $book =  $this->bookRepository->saveReserve($request->all());

        Mail::to('libray@library.com')->queue(new SendApprovedBookRequestMail($book));

        return response()->json([
            'success' => true,
            'message' => 'Created successfully.'
        ]);
    }

    public function getBookRequests()
    {
        return response()->json($this->bookRepository->getBookRequests());
    }

    public function getApprovedBook()
    {
        return response()->json($this->bookRepository->getApprovedBooks());
    }

    public function allRequests()
    {
        return view('admin.requests.index');
    }

    public function showRequest($id)
    {
        $issue = $this->bookRepository->getIssueById($id);

        return view('admin.requests.show', [
            'issue' => $issue
        ]);
    }
}
