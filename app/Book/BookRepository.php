<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 09/09/2018
 * Time: 21:59
 */

namespace App\Book;


use App\Book\Issues\Issue;
use App\Http\Controllers\TablePaginate;
use Illuminate\Support\Facades\Auth;

class BookRepository
{
    use TablePaginate;

    public function getBookById($id)
    {
        return Book::findOrFail($id);
    }

    public function save($input)
    {
        return Book::create($input);
    }

    public function saveReserve($input)
    {
      return Issue::create([
         'user_id' => Auth::user()->id,
         'book_id' => $input['book_id'],
         'issue_date' => $input['issue_date'],
         'return_date' => $input['return_date'],
         'status' => 'approved'
      ]);
    }
    public function getBooks()
    {
        return $this->tablePaginate(new Book(), [], function ($book) {
            return [
                'id' => $book->id,
                'title' => $book->title,
                'author' => $book->author,
                'synopsis' => $book->synopsis,
                'created_at' => $book->created_at,
            ];
        });
    }
}
