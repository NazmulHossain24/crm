<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteDetails extends Model
{
    protected $table = 'site_details';
    protected $primaryKey = 'siteID';
    protected $fillable = [
        'productType', 'contactName', 'companyName', 'occupancyType', 'buildingName', 'street', 'city', 'country', 'postCode',
        'landLine', 'mobileNumber', 'email', 'happy', 'contactMethod', 'isSubmit', 'processWith', 'createdBy', 'userID'
    ];

    public function electric()
    {
        return $this->hasMany('App\ElectricitySupply', 'siteID');
    }

    public function gas()
    {
        return $this->hasMany('App\GasSupply', 'siteID');
    }

    public function water()
    {
        return $this->hasMany('App\WaterSupply', 'siteID');
    }

    public function land_line()
    {
        return $this->hasMany('App\LandLine', 'siteID');
    }

    public function broadband()
    {
        return $this->hasMany('App\BroadBand', 'siteID');
    }

    public function insurance()
    {
        return $this->hasMany('App\Insurance', 'siteID');
    }

    public function e_pos()
    {
        return $this->hasMany('App\Epos', 'siteID');
    }

    public function companies()
    {
        return $this->hasMany('App\CompanyDetails', 'siteID');
    }

    public function billing()
    {
        return $this->hasMany('App\BillingDetails', 'siteID');
    }

    public function payment()
    {
        return $this->hasMany('App\PaymentDetails', 'siteID');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
    
    public function creates()
    {
        return $this->belongsTo('App\User', 'createdBy');
    }


}
