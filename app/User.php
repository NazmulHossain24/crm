<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'roles', 'viewAs', 'password', 'su', 'contact', 'address', 'nid', 'dob'
    ];
    
    public function getDobAttribute($value)
    {
        return pub_date($value);
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = db_date($value);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
