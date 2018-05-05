<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    protected $table = 'billing_details';
    protected $primaryKey = 'billingID';
    protected $fillable = [
        'siteID', 'buildingNumber', 'street', 'town', 'country', 'postCode'
    ];
}
