@php

    if(isset($site->siteID)){
        $ePos = $site->e_pos()->first();
    }

@endphp
<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-credit-card-alt"></i>
        <h3 class="box-title">E-POS</h3>
    </div>

    <form id="posFrom" action="{{action('EposController@save')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
        <input type="hidden" class="posID" name="posID" value="{{ $ePos->posID or '' }}">

        <div class="box-body">

            @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                <div class="form-group">
                    <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                    <div class="col-sm-9">
                        <select name="processWith" class="form-control" id="processWith_a">
                            <option value="">Process With...</option>
                            @foreach($process as $row)
                                @if(isset($ePos->processWith))
                                    <option value="{{$row->name}}" {{ $ePos->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>


                </div>
            @endif

            <div class="form-group">
                <label for="company4" class="col-sm-3 control-label">Current Supplier</label>
                <div class="col-sm-9">
                    <select name="company" class="form-control" id="company4">
                        @foreach($table as $row)
                            @if(isset($ePos->company))
                                <option value="{{$row->name}}" {{ $ePos->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                            @else
                                <option value="{{$row->name}}">{{$row->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="account4" class="col-sm-3 control-label">Account</label>
                <div class="col-sm-9">
                    <input type="text" name="account" class="form-control" placeholder="Account" value="{{ $ePos->account or '' }}" id="account4" />
                </div>
            </div>

            <div class="form-group">
                <label for="setupCharge4" class="col-sm-3 control-label">Setup Charge</label>
                <div class="col-sm-9">
                    <input type="text" name="setupCharge" class="form-control" placeholder="Setup Charge" value="{{ $ePos->setupCharge or '' }}" id="setupCharge4" />
                </div>
            </div>

            <div class="form-group">
                <label for="weeklyCharge4" class="col-sm-3 control-label">Weekly Charge</label>
                <div class="col-sm-9">
                    <input type="text" name="weeklyCharge" class="form-control" placeholder="Weekly Charge" value="{{ $ePos->weeklyCharge or '' }}" id="weeklyCharge4" />
                </div>
            </div>

            <div class="form-group">
                <label for="contractLength4" class="col-sm-3 control-label">Contract Length</label>
                <div class="col-sm-9">
                    <input type="text" name="contractLength" class="form-control" placeholder="Contract Length" value="{{ $ePos->contractLength or '' }}" id="contractLength4" />
                </div>
            </div>

            <div class="form-group">
                <label for="oneOf4" class="col-sm-3 control-label">One Of</label>
                <div class="col-sm-9">
                    <input type="text" name="oneOf" class="form-control" placeholder="One Of" value="{{ $ePos->oneOf or '' }}" id="oneOf4" />
                </div>
            </div>

            <div class="form-group">
                <label for="descriptions4" class="col-sm-3 control-label">Add Descriptions</label>
                <div class="col-sm-9">
                    <textarea name="descriptions" class="form-control" id="descriptions4">{{ $ePos->descriptions or '' }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="processDate4" class="col-sm-3 control-label">Process Date</label>
                <div class="col-sm-9">
                    <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $ePos->processDate or '' }}" id="processDate4"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="startDate4" class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-9">
                    <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $ePos->startDate or '' }}" id="startDate4"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="noticeDate4" class="col-sm-3 control-label">Notice Date</label>
                <div class="col-sm-9">
                    <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $ePos->noticeDate or '' }}" id="noticeDate4"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

            <div class="form-group">
                <label for="expiryDate4" class="col-sm-3 control-label">Expiry Date</label>
                <div class="col-sm-9">
                    <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $ePos->expiryDate or '' }}" id="expiryDate4"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                </div>
            </div>

        </div>
        <div class="box-footer clearfix">
            <button type="button" id="tab_g2" class="pull-left btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>
            <button type="button" id="tab_i1" class="pull-right btn btn-success">Next <i class="fa fa-chevron-right"></i></button>
        </div>
    </form>
</div>