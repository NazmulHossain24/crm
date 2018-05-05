<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewNote extends Model
{
    protected $table = 'new_note';
    protected $primaryKey = 'noteID';
    protected $fillable = [
     'siteID', 'description', 'userID'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}
