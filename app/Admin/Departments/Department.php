<?php

namespace App\Admin\Departments;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable =[
        'name',
        'slug',
        'description'
    ];
}
