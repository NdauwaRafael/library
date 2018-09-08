<?php

namespace App\Admin\Users;

use App\Admin\Departments\Department;
use App\Admin\Roles\Role;
use App\General\Users\userPresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class User extends Model
{
    use PresentableTrait;

    protected $table = 'users';

    protected $guarded = array('id', 'created_at', 'updated_at');

    protected $hidden = [
        'password', 'remember_token', 'one_time_key', 'last_sessid'
    ];

    protected $presenter = userPresenter::class;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'username',
        'department_id',
        'role_id',
        'password',
        'remember_token',
        'active',
        'block',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}
