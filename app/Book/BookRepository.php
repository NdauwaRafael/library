<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 09/09/2018
 * Time: 21:59
 */

namespace App\Book;


use App\Book\Issue;
use App\Http\Controllers\TablePaginate;
use App\User;
use Carbon\Carbon;
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
            'user_id' => auth::user()->id,
            'book_id' => $input['book_id'],
            'issue_date' => Carbon::parse($input['issue_date']),
            'return_date' => Carbon::parse($input['return_date']),
            'status' => 'Pending'
        ]);
    }

    public function approveBook($input)
    {

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

    public function getBookRequests()
    {
        return $this->tablePaginate(Issue::where('status', 'Pending')->orderBy('id', 'ASC'), [], function ($request) {
            return [
                'book' => $request->book->title,
                'status' => $request->status,
                'issue_date' => $request->issue_date,
                'return_date' => $request->return_date,
                'user' => $request->user->present()->fullName,
                'id' => $request->id
            ];
        });
    }

    public function getBookDetails($id)
    {
        $book = $this->getBookById($id);
        return [
            'id' => $book->id,
            'title' => $book->title,
            'subject' => $book->subject->name,
            'author' => $book->author,
            'synopsis' => $book->synopsis,
            'status' => $this->getStatus($book),
            'created_at' => date_format($book->created_at, 'Y-m-d H:i:s'),
        ];
    }

    public function getStatus($book)
    {
        $issue = Issue::where('book_id',$book->id)->first();

        if ($issue){
            return $issue->status;
        }
    }

    public function getApprovedBooks()
    {
        return $this->tablePaginate(Issue::where('status', 'Approved')->orderBy('id', 'ASC'), [], function ($request) {
            return [
                'book' => $request->book->title,
                'status' => $request->status,
                'issue_date' => $request->issue_date,
                'return_date' => $request->return_date,
                'user' => $request->user->present()->fullName,
                'id' => $request->id
            ];
        });
    }

    public function getIssueById($id)
    {
        return Issue::findOrFail($id);
    }

    public function getIssueDetails($id)
    {
        $issue = $this->getIssueById($id);

        return [
            'book' => $issue->book->title,
            'status' => $issue->status,
            'issue_date' => $issue->issue_date,
            'return_date' => $issue->return_date,
            'user' => $issue->user->present()->fullName,
            'id' => $issue->id
        ];
    }

    public function countItems()
    {
        return  [
          'users' => User::all()->count(),
          'books' => Book::all()->count(),
          'requests' => Issue::where('status','pending')->get()->count(),
          'issued' => Issue::where('status','approved')->get()->count(),
        ];
    }
}
