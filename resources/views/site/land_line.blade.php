@php

    if(isset($site->siteID)){
        $landLine = $site->land_line()->first();
    }

@endphp
<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-tty"></i>
        <h3 class="box-title">Land Line</h3>
    </div>

    <form id="landLineFrom" action="{{action('LandLineController@save')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
        <input type="hidden" class="landLineID" name="landLineID" value="{{ $landLine->landLineID or '' }}">

        <div class="box-body">

            @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                <div class="form-group">
                    <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                    <div class="col-sm-9">
                        <select name="processWith" class="form-control" id="processWith_a">
                            <option value="">Process With...</option>
                            @foreach($process as $row)
                                @if(isset($landLine->processWith))
                                    <option value="{{$row->name}}" {{ $landLine->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>


                </div>
            @endif

            <div class="form-group">
                <label for="company1" class="col-sm-3 control-label">Current Supplier</label>
                <div class="col-sm-9">
                    <select name="company" class="form-control" id="company1">
                        @foreach($table as $row)
                            @if(isset($landLine->company))
                                <option value="{{$row->name}}" {{ $landLine->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                            @else
                                <option value="{{$row->name}}">{{$row->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="account1" class="col-sm-3 control-label">Account</label>
                <div class="col-sm-9">
                    <input type="text" name="account" class="form-control" placeholder="Account" value="{{ $landLine->account or '' }}" id="account1" />
                </div>
            </div>

            <div class="form-group">
                <label for="telephoneNumber1" class="col-sm-3 control-label">Telephone Number</label>
                <div class="col-sm-9">
                    <input type="text" name="telephoneNumber" class="form-control" placeholder="Telephone Number" value="{{ $landLine->telephoneNumber or '' }}" id="telephoneNumber1" />
                </div>
            </div>

            <div class="form-group">
                <label for="package1" class="col-sm-3 control-label">Package</label>
                <div class="col-sm-9">
                    <input type="text" name="package" class="form-control" placeholder="Package" value="{{ $landLine->package or '' }}" id="package1" />
                </div>
            </div>

            <div class="form-group">
                <label for="contractLength1" class="col-sm-3 control-label">Contract Length</label>
                <div class="col-sm-9">
                    <input type="text" name="contractLength" class="form-control" placeholder="Contract Length" value="{{ $landLine->contractLength or '' }}" id="contractLength1" />
                </div>
            </div>

            <div class="form-group">
                <label for="processDate1" class="col-sm-3 control-label">Process Date</label>
                <div class="col-sm-9">
                    <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $landLine->processDate or '' }}" id="processDate1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="startDate1" class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-9">
                    <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $landLine->startDate or '' }}" id="startDate1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="noticeDate1" class="col-sm-3 control-label">Notice Date</label>
                <div class="col-sm-9">
                    <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $landLine->noticeDate or '' }}" id="noticeDate1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="expiryDate1" class="col-sm-3 control-label">Expiry Date</label>
                <div class="col-sm-9">
                    <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $landLine->expiryDate or '' }}" id="expiryDate1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

        </div>
        <div class="box-footer clearfix">
            <button type="button" id="tab_d2" class="pull-left btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>
            <button type="button" id="tab_f1" class="pull-right btn btn-success">Next <i class="fa fa-chevron-right"></i></button>
        </div>
    </form>
</div>