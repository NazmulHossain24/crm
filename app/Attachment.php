<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachment';
    protected $primaryKey = 'attachmentID';
    protected $fillable = [
        'title', 'descriptions', 'file_type', 'userID'
    ];

    public function getCreatedAtAttribute($value)
    {
        return pub_date($value);
    }
}
