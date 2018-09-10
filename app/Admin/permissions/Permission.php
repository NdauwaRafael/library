<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 08/09/2018
 * Time: 11:57
 */

namespace Admin\permissions;


use App\Admin\Roles\Role;
use App\Admin\Users\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $guarded = ['id','created_at','updated_at'];

    protected $fillable = [
        'name',
        'description'
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
