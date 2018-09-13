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
        $books = $this->bookRepository->getBookById($id);

        return [
            'fetched' => true,
            'data' => $books
        ];
    }

    public function getBookDetails($id)
    {
        $books = $this->bookRepository->getBookDetails($id);

        return [
            'fetched' => true,
            'data' => $books
        ];
    }

    public function approveBook(Request $request, $id)
    {
        $book = $this->bookRepository->getIssueById($id)->update($request->all());

        Mail::to('libray@library.com')->queue(new SendApprovedBookRequestMail($book));

        return response()->json([
            'success' => true,
            'message' => 'Created successfully.'
        ]);
    }

    public function rejectBook(Request $request, $id)
    {
        $this->bookRepository->getIssueById($id)->update($request->all());

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
        $issue = $this->bookRepository->getIssueDetails($id);

        return view('admin.requests.show', [
            'issue' => json_encode($issue)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->bookRepository->getBookById($id)->update($request->all());
    }

    public function count()
    {
        $count = $this->bookRepository->countItems();

        return [
            'fetched' => true,
            'data' => $count
        ];
    }
}
