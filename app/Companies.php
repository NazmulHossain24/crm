<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'companyID';
    protected $fillable = [
        'name', 'companyType', 'userID'
    ];
}
