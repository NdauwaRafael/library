<?php

namespace App\Book;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'books';

    protected $guarded = array('id', 'created_at', 'updated_at');

    protected $hidden = [
        'password', 'remember_token', 'one_time_key', 'last_sessid'
    ];

    protected $fillable = [
       'author','synopsis','title','subject_id'
    ];
}
