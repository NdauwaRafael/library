<?php

namespace App\Book;

use App\Admin\Users\User;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';

    protected $guarded = array('id', 'created_at', 'updated_at');

    protected $hidden = [
        'password', 'remember_token', 'one_time_key', 'last_sessid'
    ];

    protected $fillable = [
        'book_id','issue_date','return_date','status','user_id'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
