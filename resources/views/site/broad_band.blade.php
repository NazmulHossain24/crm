@php

    if(isset($site->siteID)){
        $broadband = $site->broadband()->first();
    }

@endphp
<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-fax"></i>
        <h3 class="box-title">Broad Band</h3>
    </div>

    <form id="broadBandFrom" action="{{action('BroadBandController@save')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
        <input type="hidden" class="broadBandID" name="broadBandID" value="{{ $broadband->broadBandID or '' }}">

        <div class="box-body">

            @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                <div class="form-group">
                    <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                    <div class="col-sm-9">
                        <select name="processWith" class="form-control" id="processWith_a">
                            <option value="">Process With...</option>
                            @foreach($process as $row)
                                @if(isset($broadband->processWith))
                                    <option value="{{$row->name}}" {{ $broadband->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>


                </div>
            @endif

            <div class="form-group">
                <label for="company2" class="col-sm-3 control-label">Current Supplier</label>
                <div class="col-sm-9">
                    <select name="company" class="form-control" id="company2">
                        @foreach($table as $row)
                            @if(isset($broadband->company))
                                <option value="{{$row->name}}" {{ $broadband->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                            @else
                                <option value="{{$row->name}}">{{$row->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="account2" class="col-sm-3 control-label">Account</label>
                <div class="col-sm-9">
                    <input type="text" name="account" class="form-control" placeholder="Account" value="{{ $broadband->account or '' }}" id="account2" />
                </div>
            </div>

            <div class="form-group">
                <label for="telephoneNumber2" class="col-sm-3 control-label">Telephone Number</label>
                <div class="col-sm-9">
                    <input type="text" name="telephoneNumber" class="form-control" placeholder="Telephone Number" value="{{ $broadband->telephoneNumber or '' }}" id="telephoneNumber2" />
                </div>
            </div>

            <div class="form-group">
                <label for="package2" class="col-sm-3 control-label">Package</label>
                <div class="col-sm-9">
                    <input type="text" name="package" class="form-control" placeholder="Package" value="{{ $broadband->package or '' }}" id="package2" />
                </div>
            </div>

            <div class="form-group">
                <label for="contractLength2" class="col-sm-3 control-label">Contract Length</label>
                <div class="col-sm-9">
                    <input type="text" name="contractLength" class="form-control" placeholder="Contract Length" value="{{ $broadband->contractLength or '' }}" id="contractLength2" />
                </div>
            </div>

            <div class="form-group">
                <label for="processDate2" class="col-sm-3 control-label">Process Date</label>
                <div class="col-sm-9">
                    <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $broadband->processDate or '' }}" id="processDate2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="startDate2" class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-9">
                    <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $broadband->startDate or '' }}" id="startDate2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="noticeDate2" class="col-sm-3 control-label">Notice Date</label>
                <div class="col-sm-9">
                    <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $broadband->noticeDate or '' }}" id="noticeDate2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="expiryDate2" class="col-sm-3 control-label">Expiry Date</label>
                <div class="col-sm-9">
                    <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $broadband->expiryDate or '' }}" id="expiryDate2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

        </div>
        <div class="box-footer clearfix">
            <button type="button" id="tab_e2" class="pull-left btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>
            <button type="button" id="tab_g1" class="pull-right btn btn-success">Next <i class="fa fa-chevron-right"></i></button>
        </div>
    </form>
</div>