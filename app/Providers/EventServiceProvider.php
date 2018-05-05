<?php

namespace App\Providers;

use App\BroadBand;
use App\CompanyDetails;
use App\ElectricitySupply;
use App\Epos;
use App\GasSupply;
use App\Insurance;
use App\LandLine;
use App\NewNote;
use App\PaymentDetails;
use App\SiteDetails;
use App\WaterSupply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        SiteDetails::creating(function($model)
        {
            $userID = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->createdBy = $userID;
            $model->userID = $userID;
        });

        SiteDetails::updating(function($model)
        {
            $userID = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userID;
        });

        NewNote::creating(function($model)
        {
            $userID = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userID;
        });

        NewNote::updating(function($model)
        {
            $userID = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userID;
        });

        BroadBand::creating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        BroadBand::updating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        CompanyDetails::creating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        CompanyDetails::updating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });


        ElectricitySupply::creating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        ElectricitySupply::updating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        Epos::creating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        Epos::updating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        GasSupply::creating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        GasSupply::updating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        Insurance::creating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        Insurance::updating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        LandLine::creating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        LandLine::updating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });


        PaymentDetails::creating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        PaymentDetails::updating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });


        WaterSupply::creating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });

        WaterSupply::updating(function($model)
        {
            $table = SiteDetails::find($model->siteID);
            $table->updated_at = date('Y-m-d H:i:s');
            $table->save();
        });
    }
}
