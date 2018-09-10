<?php

namespace App\Http\Controllers\Book;

use App\Book\BookRepository;
use App\Book\BookRules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
