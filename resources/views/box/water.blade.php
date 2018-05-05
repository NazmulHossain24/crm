@php

    if(isset($site->siteID)){
        $water1 = $site->water()->where('meterNo', 1)->first();
        $water2 = $site->water()->where('meterNo', 2)->first();
        $water3 = $site->water()->where('meterNo', 3)->first();
    }

@endphp

<div id="waterMeter1" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Water Meter 1</h4>
            </div>
            <form id="waterFrom1" action="{{action('WaterController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
                <input type="hidden" name="meterNo" value="1" >
                <input type="hidden" class="waterSupplyID1" name="waterSupplyID" value="{{ $water1->waterSupplyID or '' }}">

                <div class="modal-body box-overflow">

                    @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <div class="form-group">
                            <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                            <div class="col-sm-9">
                                <select name="processWith" class="form-control" id="processWith_a">
                                    <option value="">Process With...</option>
                                    @foreach($process as $row)
                                        @if(isset($water1->processWith))
                                            <option value="{{$row->name}}" {{ $water1->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>


                        </div>
                    @endif

                    <div class="form-group">
                        <label for="company_d" class="col-sm-3 control-label">Current Supplier</label>
                        <div class="col-sm-9">
                            <select name="company" class="form-control" id="company_c">
                                @foreach($table as $row)
                                    @if(isset($water1->company))
                                        <option value="{{$row->name}}" {{ $water1->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="account_d" class="col-sm-3 control-label">Account</label>
                        <div class="col-sm-9">
                            <input type="text" name="account" class="form-control" placeholder="Account" value="{{ $water1->account or '' }}" id="account_d" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="standingCharge_d" class="col-sm-3 control-label">Standing Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="standingCharge" class="form-control" placeholder="Standing Charge" value="{{ $water1->standingCharge or '' }}" id="standingCharge_d" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitCharge_d" class="col-sm-3 control-label">Unit Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="unitCharge" class="form-control" placeholder="Unit Charge" value="{{ $water1->unitCharge or '' }}" id="unitCharge_d" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contractLength_d" class="col-sm-3 control-label">Contract Length</label>
                        <div class="col-sm-9">
                            <input type="text" name="contractLength" class="form-control" placeholder="Contract Length" value="{{ $water1->contractLength or '' }}" id="contractLength_d" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meterSerial_d" class="col-sm-3 control-label">Meter Serial Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="meterSerial" class="form-control" placeholder="Meter Serial Number" value="{{ $water1->meterSerial or '' }}" id="meterSerial_d" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="processDate_d" class="col-sm-3 control-label">Process Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $water1->processDate or '' }}" id="processDate_d"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate_d" class="col-sm-3 control-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $water1->startDate or '' }}" id="startDate_d"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="noticeDate_d" class="col-sm-3 control-label">Notice Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $water1->noticeDate or '' }}" id="noticeDate_d"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="expiryDate_d" class="col-sm-3 control-label">Expiry Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $water1->expiryDate or '' }}" id="expiryDate_d"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startReading_d" class="col-sm-3 control-label">Start Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="startReading" class="form-control" placeholder="Start Reading" value="{{ $water1->startReading or '' }}" id="startReading_d" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endReading_d" class="col-sm-3 control-label">End Reading:</label>
                        <div class="col-sm-9">
                            <input type="text" name="endReading" class="form-control" placeholder="End Reading" value="{{ $water1->endReading or '' }}" id="endReading_d" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usesAQ_d" class="col-sm-3 control-label">AQ Usages (kWh):</label>
                        <div class="col-sm-9">
                            <input type="text" name="usesAQ" class="form-control" placeholder="AQ (Usages (kWh)" value="{{ $water1->usesAQ or '' }}" id="usesAQ_d" />
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div id="waterMeter2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Water Meter 2</h4>
            </div>
            <form id="waterFrom2" action="{{action('WaterController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
                <input type="hidden" name="meterNo" value="2" >
                <input type="hidden" class="waterSupplyID2" name="waterSupplyID" value="{{ $water2->waterSupplyID or '' }}">

                <div class="modal-body box-overflow">

                    @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <div class="form-group">
                            <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                            <div class="col-sm-9">
                                <select name="processWith" class="form-control" id="processWith_a">
                                    <option value="">Process With...</option>
                                    @foreach($process as $row)
                                        @if(isset($water2->processWith))
                                            <option value="{{$row->name}}" {{ $water2->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>


                        </div>
                    @endif

                    <div class="form-group">
                        <label for="company_d1" class="col-sm-3 control-label">Current Supplier</label>
                        <div class="col-sm-9">
                            <select name="company" class="form-control" id="company_d1">
                                @foreach($table as $row)
                                    @if(isset($water2->company))
                                        <option value="{{$row->name}}" {{ $water2->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="account_d1" class="col-sm-3 control-label">Account</label>
                        <div class="col-sm-9">
                            <input type="text" name="account" class="form-control" placeholder="Account" value="{{ $water2->account or '' }}" id="account_d1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="standingCharge_d1" class="col-sm-3 control-label">Standing Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="standingCharge" class="form-control" placeholder="Standing Charge" value="{{ $water2->standingCharge or '' }}" id="standingCharge_d1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitCharge_d1" class="col-sm-3 control-label">Unit Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="unitCharge" class="form-control" placeholder="Unit Charge" value="{{ $water2->unitCharge or '' }}" id="unitCharge_d1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contractLength_d1" class="col-sm-3 control-label">Contract Length</label>
                        <div class="col-sm-9">
                            <input type="text" name="contractLength" class="form-control" placeholder="Contract Length" value="{{ $water2->contractLength or '' }}" id="contractLength_d1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meterSerial_d1" class="col-sm-3 control-label">Meter Serial Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="meterSerial" class="form-control" placeholder="Meter Serial Number" value="{{ $water2->meterSerial or '' }}" id="meterSerial_d1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="processDate_d1" class="col-sm-3 control-label">Process Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $water2->processDate or '' }}" id="processDate_d1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate_d1" class="col-sm-3 control-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $water2->startDate or '' }}" id="startDate_d1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="noticeDate_d1" class="col-sm-3 control-label">Notice Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $water2->noticeDate or '' }}" id="noticeDate_d1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="expiryDate_d1" class="col-sm-3 control-label">Expiry Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $water2->expiryDate or '' }}" id="expiryDate_d1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startReading_d1" class="col-sm-3 control-label">Start Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="startReading" class="form-control" placeholder="Start Reading" value="{{ $water2->startReading or '' }}" id="startReading_d1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endReading_d1" class="col-sm-3 control-label">End Reading:</label>
                        <div class="col-sm-9">
                            <input type="text" name="endReading" class="form-control" placeholder="End Reading" value="{{ $water2->endReading or '' }}" id="endReading_d1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usesAQ_d1" class="col-sm-3 control-label">AQ Usages (kWh):</label>
                        <div class="col-sm-9">
                            <input type="text" name="usesAQ" class="form-control" placeholder="AQ (Usages (kWh)" value="{{ $water2->usesAQ or '' }}" id="usesAQ_d1" />
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div id="waterMeter3" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Water Meter 3</h4>
            </div>
            <form id="waterFrom3" action="{{action('WaterController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
                <input type="hidden" name="meterNo" value="3" >
                <input type="hidden" class="waterSupplyID3" name="waterSupplyID" value="{{ $water3->waterSupplyID or '' }}">

                <div class="modal-body box-overflow">

                    @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <div class="form-group">
                            <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                            <div class="col-sm-9">
                                <select name="processWith" class="form-control" id="processWith_a">
                                    <option value="">Process With...</option>
                                    @foreach($process as $row)
                                        @if(isset($water3->processWith))
                                            <option value="{{$row->name}}" {{ $water3->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>


                        </div>
                    @endif

                    <div class="form-group">
                        <label for="company_d2" class="col-sm-3 control-label">Current Supplier</label>
                        <div class="col-sm-9">
                            <select name="company" class="form-control" id="company_d2">
                                @foreach($table as $row)
                                    @if(isset($water3->company))
                                        <option value="{{$row->name}}" {{ $water3->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="account_d2" class="col-sm-3 control-label">Account</label>
                        <div class="col-sm-9">
                            <input type="text" name="account" class="form-control" placeholder="Account" value="{{ $water3->account or '' }}" id="account_d2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="standingCharge_d2" class="col-sm-3 control-label">Standing Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="standingCharge" class="form-control" placeholder="Standing Charge" value="{{ $water3->standingCharge or '' }}" id="standingCharge_d2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitCharge_d2" class="col-sm-3 control-label">Unit Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="unitCharge" class="form-control" placeholder="Unit Charge" value="{{ $water3->unitCharge or '' }}" id="unitCharge_d2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contractLength_d2" class="col-sm-3 control-label">Contract Length</label>
                        <div class="col-sm-9">
                            <input type="text" name="contractLength" class="form-control" placeholder="Contract Length" value="{{ $water3->contractLength or '' }}" id="contractLength_d2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meterSerial_d2" class="col-sm-3 control-label">Meter Serial Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="meterSerial" class="form-control" placeholder="Meter Serial Number" value="{{ $water3->meterSerial or '' }}" id="meterSerial_d2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="processDate_d2" class="col-sm-3 control-label">Process Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $water3->processDate or '' }}" id="processDate_d2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate_d2" class="col-sm-3 control-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $water3->startDate or '' }}" id="startDate_d2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="noticeDate_d2" class="col-sm-3 control-label">Notice Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $water3->noticeDate or '' }}" id="noticeDate_d2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="expiryDate_d2" class="col-sm-3 control-label">Expiry Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $water3->expiryDate or '' }}" id="expiryDate_d2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startReading_d2" class="col-sm-3 control-label">Start Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="startReading" class="form-control" placeholder="Start Reading" value="{{ $water3->startReading or '' }}" id="startReading_d2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endReading_d2" class="col-sm-3 control-label">End Reading:</label>
                        <div class="col-sm-9">
                            <input type="text" name="endReading" class="form-control" placeholder="End Reading" value="{{ $water3->endReading or '' }}" id="endReading_d2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usesAQ_d2" class="col-sm-3 control-label">AQ Usages (kWh):</label>
                        <div class="col-sm-9">
                            <input type="text" name="usesAQ" class="form-control" placeholder="AQ (Usages (kWh)" value="{{ $water3->usesAQ or '' }}" id="usesAQ_d2" />
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>