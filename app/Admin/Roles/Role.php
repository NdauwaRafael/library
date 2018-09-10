<?php

namespace App\Admin\Roles;

use Admin\permissions\Permission;
use Admin\permissions\RolePermission;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Role extends Model
{
    use SearchableTrait;

    protected $table = 'roles';

    protected $searchable = [
        'columns' => [
            'roles.name' => 5,
            'roles.description' =>5,
        ],
    ];

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable =[
        'name',
        'slug',
        'description'
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class);
    }
}
