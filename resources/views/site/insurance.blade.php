@php

    if(isset($site->siteID)){
        $insurance = $site->insurance()->first();
    }

@endphp
<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-leaf"></i>
        <h3 class="box-title">Insurance</h3>
    </div>

    <form id="insuranceFrom" action="{{action('InsuranceController@save')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
        <input type="hidden" class="insuranceID" name="insuranceID" value="{{ $insurance->insuranceID or '' }}">

        <div class="box-body">

            @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                <div class="form-group">
                    <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                    <div class="col-sm-9">
                        <select name="processWith" class="form-control" id="processWith_a">
                            <option value="">Process With...</option>
                            @foreach($process as $row)
                                @if(isset($insurance->processWith))
                                    <option value="{{$row->name}}" {{ $insurance->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>


                </div>
            @endif

            <div class="form-group">
                <label for="company3" class="col-sm-3 control-label">Current Supplier</label>
                <div class="col-sm-9">
                    <select name="company" class="form-control" id="company3">
                        @foreach($table as $row)
                            @if(isset($insurance->company))
                                <option value="{{$row->name}}" {{ $insurance->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                            @else
                                <option value="{{$row->name}}">{{$row->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="account3" class="col-sm-3 control-label">Account</label>
                <div class="col-sm-9">
                    <input type="text" name="account" class="form-control" placeholder="Account" value="{{ $insurance->account or '' }}" id="account3" />
                </div>
            </div>

            <div class="form-group">
                <label for="oldCharge3" class="col-sm-3 control-label">Old Charge</label>
                <div class="col-sm-9">
                    <input type="text" name="oldCharge" class="form-control" placeholder="Old Charge" value="{{ $insurance->oldCharge or '' }}" id="oldCharge3" />
                </div>
            </div>

            <div class="form-group">
                <label for="newCharge3" class="col-sm-3 control-label">New Charge</label>
                <div class="col-sm-9">
                    <input type="text" name="newCharge" class="form-control" placeholder="New Charge" value="{{ $insurance->newCharge or '' }}" id="newCharge3" />
                </div>
            </div>

            <div class="form-group">
                <label for="contractLength3" class="col-sm-3 control-label">Contract Length</label>
                <div class="col-sm-9">
                    <input type="text" name="contractLength" class="form-control" placeholder="Contract Length" value="{{ $insurance->contractLength or '' }}" id="contractLength3" />
                </div>
            </div>

            <div class="form-group">
                <label for="processDate3" class="col-sm-3 control-label">Process Date</label>
                <div class="col-sm-9">
                    <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $insurance->processDate or '' }}" id="processDate3"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="startDate3" class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-9">
                    <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $insurance->startDate or '' }}" id="startDate3"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="noticeDate3" class="col-sm-3 control-label">Notice Date</label>
                <div class="col-sm-9">
                    <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $insurance->noticeDate or '' }}" id="noticeDate3"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="expiryDate3" class="col-sm-3 control-label">Expiry Date</label>
                <div class="col-sm-9">
                    <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $insurance->expiryDate or '' }}" id="expiryDate3"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

        </div>
        <div class="box-footer clearfix">
            <button type="button" id="tab_f2" class="pull-left btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>
            <button type="button" id="tab_h1" class="pull-right btn btn-success">Next <i class="fa fa-chevron-right"></i></button>
        </div>
    </form>
</div>