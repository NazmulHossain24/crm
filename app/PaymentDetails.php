<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    protected $table = 'payment_details';
    protected $primaryKey = 'paymentID';
    protected $fillable = [
        'siteID', 'paymentMethod', 'billingFrequency', 'bankName', 'shortCode', 'accountName', 'accountNumber'
    ];
}
