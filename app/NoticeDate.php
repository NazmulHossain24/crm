<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoticeDate extends Model
{
    use SoftDeletes;

    protected $table = 'notice_date';
    protected $primaryKey = 'noticeID';
    protected $fillable = [
        'siteID', 'noticeDate', 'meterNo', 'meterType', 'description'
    ];

    public function site()
    {
        return $this->belongsTo('App\SiteDetails', 'siteID');
    }

    public function all_info($meterNo, $meterType){
        switch ($meterType) {
            case "Electricity":
                $table = ElectricitySupply::find($meterNo);
                break;
            case "Gas":
                $table = GasSupply::find($meterNo);
                break;
            case "Water":
                $table = WaterSupply::find($meterNo);
                break;
            case "Land Line":
                $table = LandLine::find($meterNo);
                break;
            case "Broadband":
                $table = BroadBand::find($meterNo);
                break;
            case "Insurance":
                $table = Insurance::find($meterNo);
                break;
            default:
                $table = Epos::find($meterNo);
        }

        return pub_date($table->expiryDate);
    }

    public function getNoticeDateAttribute($value)
    {
        return pub_date($value);
    }

    public function setNoticeDateAttribute($value)
    {
        $this->attributes['noticeDate'] = db_date($value);
    }
}
