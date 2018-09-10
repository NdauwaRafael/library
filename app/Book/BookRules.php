<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 09/09/2018
 * Time: 22:05
 */

namespace App\Book;


use App\Rules\Rules;

trait BookRules
{
    use Rules;


    public function createBook($request)
    {
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'synopsis' => 'required',
        ];

        return $this->verdict($request, $rules);
    }

    public function updateBook($request, $id)
    {
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'synopsis' => 'required',
        ];

        return $this->verdict($request, $rules);
    }

    public function reserveBook($request)
    {
        $rules = [
            'book_id' => 'required',
            'user_id' => 'required',
            'issue_date' => 'required',
            'return_date' => 'required',
        ];

        return $this->verdict($request, $rules);
    }

}
