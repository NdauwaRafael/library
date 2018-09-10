<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 09/09/2018
 * Time: 21:59
 */

namespace App\Book;


use App\Http\Controllers\TablePaginate;

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
