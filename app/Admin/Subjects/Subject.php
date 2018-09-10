<?php

namespace App\Admin\Subjects;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable =[
        'name'
    ];
}
