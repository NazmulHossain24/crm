@php

    if(isset($site->siteID)){
        $bill = $site->billing()->first();
    }

@endphp
<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-calculator"></i>
        <h3 class="box-title">Billing Details</h3>
    </div>

    <form id="billingFrom" action="{{action('BillingController@save')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
        <input type="hidden" class="billingID" name="billingID" value="{{ $bill->billingID or '' }}">

        <div class="box-body">

            <div class="form-group">
                <label class="col-sm-3 control-label">Copy Address</label>
                <div class="col-sm-9">
                    <button type="button" id="copyAddress_f" class="btn btn-flat btn-info"><i class="fa fa-copy"></i> Copy Address</button>
                </div>
            </div>

            <div class="form-group">
                <label for="buildingNumber_f" class="col-sm-3 control-label">Billing Building Name/Number</label>
                <div class="col-sm-9">
                    <input type="text" name="buildingNumber" class="form-control" placeholder="Billing Building Name/Number" value="{{ $bill->buildingNumber or '' }}" id="buildingNumber_f" />
                </div>
            </div>

            <div class="form-group">
                <label for="street_f" class="col-sm-3 control-label">Billing Number & Street</label>
                <div class="col-sm-9">
                    <input type="text" name="street" class="form-control" placeholder="Billing Number & Street" value="{{ $bill->street or '' }}" id="street_f" />
                </div>
            </div>

            <div class="form-group">
                <label for="town_f" class="col-sm-3 control-label">Billing Town/City</label>
                <div class="col-sm-9">
                    <input type="text" name="town" class="form-control" placeholder="Billing Town/City" value="{{ $bill->town or '' }}" id="town_f" />
                </div>
            </div>

            <div class="form-group">
                <label for="country_f" class="col-sm-3 control-label">Billing Country</label>
                <div class="col-sm-9">
                    <input type="text" name="country" class="form-control" placeholder="Billing Country" value="{{ $bill->country or '' }}" id="country_f" />
                </div>
            </div>

            <div class="form-group">
                <label for="postCode_f" class="col-sm-3 control-label">Billing Post Code</label>
                <div class="col-sm-9">
                    <input type="text" name="postCode" class="form-control" placeholder="Billing Post Code" value="{{ $bill->postCode or '' }}" id="postCode_f" />
                </div>
            </div>

        </div>
        <div class="box-footer clearfix">
            <button type="button" id="tab_i2" class="pull-left btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>
            <button type="button" id="tab_k1" class="pull-right btn btn-success">Next <i class="fa fa-chevron-right"></i></button>
        </div>
    </form>
</div>