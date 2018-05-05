<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterSupply extends Model
{
    protected $table = 'water_supply';
    protected $primaryKey = 'waterSupplyID';
    protected $fillable = [
        'siteID', 'company', 'meterNo', 'account', 'standingCharge', 'unitCharge', 'contractLength', 'processDate',
        'startDate', 'noticeDate', 'expiryDate', 'meterSerial', 'startReading', 'endReading', 'processWith', 'usesAQ'
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
