<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmitLog extends Model
{
    protected $table = 'submit_log';
    protected $primaryKey = 'submitLogID';
    protected $fillable = [
        'siteID', 'electricity', 'gas', 'water', 'lend_line', 'broad_band', 'insurance',
        'e_pos', 'isPay', 'userID'
    ];

    public function site()
    {
        return $this->belongsTo('App\SiteDetails', 'siteID');
    }

}
