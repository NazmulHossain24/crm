<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BroadBand extends Model
{
    protected $table = 'broad_band';
    protected $primaryKey = 'broadBandID';
    protected $fillable = [
        'siteID', 'company', 'account', 'telephoneNumber', 'package', 'processDate',
        'startDate', 'noticeDate', 'expiryDate', 'processWith', 'contractLength'
    ];

    public function getProcessDateAttribute($value)
    {
        return pub_date($value);
    }

    public function getStartDateAttribute($value)
    {
        return pub_date($value);
    }

    public function getNoticeDateAttribute($value)
    {
        return pub_date($value);
    }

    public function getExpiryDateAttribute($value)
    {
        return pub_date($value);
    }

    public function setProcessDateAttribute($value)
    {
        $this->attributes['processDate'] = db_date($value);
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['startDate'] =db_date($value);
    }

    public function setNoticeDateAttribute($value)
    {
        $this->attributes['noticeDate'] = db_date($value);
    }

    public function setExpiryDateAttribute($value)
    {
        $this->attributes['expiryDate'] = db_date($value);
    }
}
