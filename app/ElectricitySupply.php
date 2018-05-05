<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectricitySupply extends Model
{
    protected $table = 'electricity_supply';
    protected $primaryKey = 'electricitySupplyID';
    protected $fillable = [
        'siteID', 'company', 'meterNo', 'mpan', 'topLine', 'currentAC', 'standingCharge', 'unitCharge', 'dayUnit', 'weekendUnit',
        'nightUnit', 'otherUnit', 'upList', 'contractLength', 'processDate', 'startDate', 'noticeDate', 'expiryDate',
        'meterSerial', 'startReading', 'endReading', 'dayUses',  'weekendUses', 'nightUses', 'processWith', 'usesAQ'
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
