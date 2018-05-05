@php

    if(isset($site->siteID)){
        $electric1 = $site->electric()->where('meterNo', 1)->first();
        $electric2 = $site->electric()->where('meterNo', 2)->first();
        $electric3 = $site->electric()->where('meterNo', 3)->first();
    }

@endphp

<div id="electiricMeter1" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Electric Meter 1</h4>
            </div>
            <form id="electricityFrom1" action="{{action('ElectricityController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}" >
                <input type="hidden" name="meterNo" value="1" >
                <input type="hidden" class="electricitySupplyID1" name="electricitySupplyID" value="{{ $electric1->electricitySupplyID or '' }}">

                <div class="modal-body box-overflow">
                    @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <div class="form-group">
                            <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                            <div class="col-sm-9">
                                <select name="processWith" class="form-control" id="processWith_a">
                                    <option value="">Process With...</option>
                                    @foreach($process as $row)
                                        @if(isset($electric1->processWith))
                                            <option value="{{$row->name}}" {{ $electric1->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>


                        </div>
                    @endif

                    <div class="form-group">
                        <label for="company_b" class="col-sm-3 control-label">Current Supplier</label>
                        <div class="col-sm-9">
                            <select name="company" class="form-control" id="company_b">
                                @foreach($table as $row)
                                    @if(isset($electric1->company))
                                        <option value="{{$row->name}}" {{ $electric1->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="topLine_b" class="col-sm-3 control-label">Top Line</label>
                        <div class="col-sm-9">
                            <input type="text" name="topLine" class="form-control" placeholder="Top Line" value="{{ $electric1->topLine or '' }}" id="topLine_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mpan_b" class="col-sm-3 control-label">MPAN</label>
                        <div class="col-sm-9">
                            <input type="text" name="mpan" class="form-control" placeholder="MPAN" value="{{ $electric1->mpan or '' }}" id="mpan_b" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="currentAC_b" class="col-sm-3 control-label">Current Supply A/C</label>
                        <div class="col-sm-9">
                            <input type="text" name="currentAC" class="form-control" placeholder="Current Supply A/C" value="{{ $electric1->currentAC or '' }}" id="currentAC_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="standingCharge_b" class="col-sm-3 control-label">Standing Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="standingCharge" class="form-control" placeholder="Standing Charge" value="{{ $electric1->standingCharge or '' }}" id="standingCharge_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitCharge_b" class="col-sm-3 control-label">Unit Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="unitCharge" class="form-control" placeholder="Unit Charge" value="{{ $electric1->unitCharge or '' }}" id="unitCharge_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dayUnit_b" class="col-sm-3 control-label">Day Unit</label>
                        <div class="col-sm-9">
                            <input type="text" name="dayUnit" class="form-control" placeholder="Day Unit" value="{{ $electric1->dayUnit or '' }}" id="dayUnit_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="weekendUnit_b" class="col-sm-3 control-label">Evening /Weekend Unit</label>
                        <div class="col-sm-9">
                            <input type="text" name="weekendUnit" class="form-control" placeholder="Evening /Weekend Unit" value="{{ $electric1->weekendUnit or '' }}" id="weekendUnit_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nightUnit_b" class="col-sm-3 control-label">Night Unit</label>
                        <div class="col-sm-9">
                            <input type="text" name="nightUnit" class="form-control" placeholder="Night Unit" value="{{ $electric1->nightUnit or '' }}" id="nightUnit_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="upList_b" class="col-sm-3 control-label">Up Lift</label>
                        <div class="col-sm-9">
                            <input type="text" name="upList" class="form-control" placeholder="Up Lift" value="{{ $electric1->upList or '' }}" id="upList_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contractLength_b" class="col-sm-3 control-label">Length of Contract</label>
                        <div class="col-sm-9">
                            <input type="text" name="contractLength" class="form-control" placeholder="Length of Contract" value="{{ $electric1->contractLength or '' }}" id="contractLength_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="processDate_b" class="col-sm-3 control-label">Process Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $electric1->processDate or '' }}" id="processDate_b"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate_b" class="col-sm-3 control-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $electric1->startDate or '' }}" id="startDate_b"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="noticeDate_b" class="col-sm-3 control-label">Notice Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $electric1->noticeDate or '' }}" id="noticeDate_b" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="expiryDate_b" class="col-sm-3 control-label">Expiry Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $electric1->expiryDate or '' }}" id="expiryDate_b"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meterSerial_b" class="col-sm-3 control-label">Meter Serial Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="meterSerial" class="form-control" placeholder="Meter Serial Number" value="{{ $electric1->meterSerial or '' }}" id="meterSerial_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startReading_b" class="col-sm-3 control-label">Start Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="startReading" class="form-control" placeholder="Start Reading" value="{{ $electric1->startReading or '' }}" id="startReading_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endReading_b" class="col-sm-3 control-label">End Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="endReading" class="form-control" placeholder="End Reading" value="{{ $electric1->endReading or '' }}" id="endReading_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dayUses_b" class="col-sm-3 control-label">Day Usages</label>
                        <div class="col-sm-9">
                            <input type="text" name="dayUses" class="form-control" placeholder="Day Usages" value="{{ $electric1->dayUses or '' }}" id="dayUses_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="weekendUses_b" class="col-sm-3 control-label">Evening /Weekend Usages</label>
                        <div class="col-sm-9">
                            <input type="text" name="weekendUses" class="form-control" placeholder="Evening /Weekend Usages" value="{{ $electric1->weekendUses or '' }}" id="weekendUses_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nightUses_b" class="col-sm-3 control-label">Night Usages</label>
                        <div class="col-sm-9">
                            <input type="text" name="nightUses" class="form-control" placeholder="Night Usages" value="{{ $electric1->nightUses or '' }}" id="nightUses_b" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usesAQ_b" class="col-sm-3 control-label">AQ (Usages (kWh)</label>
                        <div class="col-sm-9">
                            <input type="text" name="usesAQ" class="form-control" placeholder="AQ (Usages (kWh)" value="{{ $electric1->usesAQ or '' }}" id="usesAQ_b" />
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



<div id="electiricMeter2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Electric Meter 2</h4>
            </div>
            <form id="electricityFrom2" action="{{action('ElectricityController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}" >
                <input type="hidden" name="meterNo" value="2" >
                <input type="hidden" class="electricitySupplyID2" name="electricitySupplyID" value="{{ $electric2->electricitySupplyID or '' }}">

                <div class="modal-body box-overflow">
                    @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <div class="form-group">
                            <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                            <div class="col-sm-9">
                                <select name="processWith" class="form-control" id="processWith_a">
                                    <option value="">Process With...</option>
                                    @foreach($process as $row)
                                        @if(isset($electric2->processWith))
                                            <option value="{{$row->name}}" {{ $electric2->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>


                        </div>
                    @endif

                    <div class="form-group">
                        <label for="company_b1" class="col-sm-3 control-label">Current Supplier</label>
                        <div class="col-sm-9">
                            <select name="company" class="form-control" id="company_b1">
                                @foreach($table as $row)
                                    @if(isset($electric2->company))
                                        <option value="{{$row->name}}" {{ $electric2->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="topLine_b1" class="col-sm-3 control-label">Top Line</label>
                        <div class="col-sm-9">
                            <input type="text" name="topLine" class="form-control" placeholder="Top Line" value="{{ $electric2->topLine or '' }}" id="topLine_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mpan_b1" class="col-sm-3 control-label">MPAN</label>
                        <div class="col-sm-9">
                            <input type="text" name="mpan" class="form-control" placeholder="MPAN" value="{{ $electric2->mpan or '' }}" id="mpan_b1" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="currentAC_b1" class="col-sm-3 control-label">Current Supply A/C</label>
                        <div class="col-sm-9">
                            <input type="text" name="currentAC" class="form-control" placeholder="Current Supply A/C" value="{{ $electric2->currentAC or '' }}" id="currentAC_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="standingCharge_b1" class="col-sm-3 control-label">Standing Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="standingCharge" class="form-control" placeholder="Standing Charge" value="{{ $electric2->standingCharge or '' }}" id="standingCharge_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitCharge_b1" class="col-sm-3 control-label">Unit Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="unitCharge" class="form-control" placeholder="Unit Charge" value="{{ $electric2->unitCharge or '' }}" id="unitCharge_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dayUnit_b1" class="col-sm-3 control-label">Day Unit</label>
                        <div class="col-sm-9">
                            <input type="text" name="dayUnit" class="form-control" placeholder="Day Unit" value="{{ $electric2->dayUnit or '' }}" id="dayUnit_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="weekendUnit_b1" class="col-sm-3 control-label">Evening /Weekend Unit</label>
                        <div class="col-sm-9">
                            <input type="text" name="weekendUnit" class="form-control" placeholder="Evening /Weekend Unit" value="{{ $electric2->weekendUnit or '' }}" id="weekendUnit_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nightUnit_b1" class="col-sm-3 control-label">Night Unit</label>
                        <div class="col-sm-9">
                            <input type="text" name="nightUnit" class="form-control" placeholder="Night Unit" value="{{ $electric2->nightUnit or '' }}" id="nightUnit_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="upList_b1" class="col-sm-3 control-label">Up Lift</label>
                        <div class="col-sm-9">
                            <input type="text" name="upList" class="form-control" placeholder="Up Lift" value="{{ $electric2->upList or '' }}" id="upList_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contractLength_b1" class="col-sm-3 control-label">Length of Contract</label>
                        <div class="col-sm-9">
                            <input type="text" name="contractLength" class="form-control" placeholder="Length of Contract" value="{{ $electric2->contractLength or '' }}" id="contractLength_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="processDate_b1" class="col-sm-3 control-label">Process Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $electric2->processDate or '' }}" id="processDate_b1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate_b1" class="col-sm-3 control-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $electric2->startDate or '' }}" id="startDate_b1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="noticeDate_b1" class="col-sm-3 control-label">Notice Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $electric2->noticeDate or '' }}" id="noticeDate_b1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="expiryDate_b1" class="col-sm-3 control-label">Expiry Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $electric2->expiryDate or '' }}" id="expiryDate_b1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meterSerial_b1" class="col-sm-3 control-label">Meter Serial Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="meterSerial" class="form-control" placeholder="Meter Serial Number" value="{{ $electric2->meterSerial or '' }}" id="meterSerial_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startReading_b1" class="col-sm-3 control-label">Start Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="startReading" class="form-control" placeholder="Start Reading" value="{{ $electric2->startReading or '' }}" id="startReading_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endReading_b1" class="col-sm-3 control-label">End Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="endReading" class="form-control" placeholder="End Reading" value="{{ $electric2->endReading or '' }}" id="endReading_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dayUses_b1" class="col-sm-3 control-label">Day Usages</label>
                        <div class="col-sm-9">
                            <input type="text" name="dayUses" class="form-control" placeholder="Day Usages" value="{{ $electric2->dayUses or '' }}" id="dayUses_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="weekendUses_b1" class="col-sm-3 control-label">Evening /Weekend Usages</label>
                        <div class="col-sm-9">
                            <input type="text" name="weekendUses" class="form-control" placeholder="Evening /Weekend Usages" value="{{ $electric2->weekendUses or '' }}" id="weekendUses_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nightUses_b1" class="col-sm-3 control-label">Night Usages</label>
                        <div class="col-sm-9">
                            <input type="text" name="nightUses" class="form-control" placeholder="Night Usages" value="{{ $electric2->nightUses or '' }}" id="nightUses_b1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usesAQ_b1" class="col-sm-3 control-label">AQ (Usages (kWh)</label>
                        <div class="col-sm-9">
                            <input type="text" name="usesAQ" class="form-control" placeholder="AQ (Usages (kWh)" value="{{ $electric2->usesAQ or '' }}" id="usesAQ_b1" />
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




<div id="electiricMeter3" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Electric Meter 3</h4>
            </div>
            <form id="electricityFrom3" action="{{action('ElectricityController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <input type="hidden" class="siteID" name="siteID"  value="{{ $site->siteID or '' }}">
                <input type="hidden" name="meterNo" value="3" >
                <input type="hidden" class="electricitySupplyID3" name="electricitySupplyID" value="{{ $electric3->electricitySupplyID or '' }}">

                <div class="modal-body box-overflow">
                    @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <div class="form-group">
                            <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                            <div class="col-sm-9">
                                <select name="processWith" class="form-control" id="processWith_a">
                                    <option value="">Process With...</option>
                                    @foreach($process as $row)
                                        @if(isset($electric3->processWith))
                                            <option value="{{$row->name}}" {{ $electric3->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>


                        </div>
                    @endif

                    <div class="form-group">
                        <label for="company_b2" class="col-sm-3 control-label">Current Supplier</label>
                        <div class="col-sm-9">
                            <select name="company" class="form-control" id="company_b2">
                                @foreach($table as $row)
                                    @if(isset($electric3->company))
                                        <option value="{{$row->name}}" {{ $electric3->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="topLine_b2" class="col-sm-3 control-label">Top Line</label>
                        <div class="col-sm-9">
                            <input type="text" name="topLine" class="form-control" placeholder="Top Line" value="{{ $electric3->topLine or '' }}" id="topLine_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mpan_b2" class="col-sm-3 control-label">MPAN</label>
                        <div class="col-sm-9">
                            <input type="text" name="mpan" class="form-control" placeholder="MPAN" value="{{ $electric3->mpan or '' }}" id="mpan_b2" />
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="currentAC_b2" class="col-sm-3 control-label">Current Supply A/C</label>
                        <div class="col-sm-9">
                            <input type="text" name="currentAC" class="form-control" placeholder="Current Supply A/C" value="{{ $electric3->currentAC or '' }}" id="currentAC_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="standingCharge_b2" class="col-sm-3 control-label">Standing Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="standingCharge" class="form-control" placeholder="Standing Charge" value="{{ $electric3->standingCharge or '' }}" id="standingCharge_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitCharge_b2" class="col-sm-3 control-label">Unit Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="unitCharge" class="form-control" placeholder="Unit Charge" value="{{ $electric3->unitCharge or '' }}" id="unitCharge_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dayUnit_b2" class="col-sm-3 control-label">Day Unit</label>
                        <div class="col-sm-9">
                            <input type="text" name="dayUnit" class="form-control" placeholder="Day Unit" value="{{ $electric3->dayUnit or '' }}" id="dayUnit_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="weekendUnit_b2" class="col-sm-3 control-label">Evening /Weekend Unit</label>
                        <div class="col-sm-9">
                            <input type="text" name="weekendUnit" class="form-control" placeholder="Evening /Weekend Unit" value="{{ $electric3->weekendUnit or '' }}" id="weekendUnit_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nightUnit_b2" class="col-sm-3 control-label">Night Unit</label>
                        <div class="col-sm-9">
                            <input type="text" name="nightUnit" class="form-control" placeholder="Night Unit" value="{{ $electric3->nightUnit or '' }}" id="nightUnit_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="upList_b2" class="col-sm-3 control-label">Up Lift</label>
                        <div class="col-sm-9">
                            <input type="text" name="upList" class="form-control" placeholder="Up Lift" value="{{ $electric3->upList or '' }}" id="upList_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contractLength_b2" class="col-sm-3 control-label">Length of Contract</label>
                        <div class="col-sm-9">
                            <input type="text" name="contractLength" class="form-control" placeholder="Length of Contract" value="{{ $electric3->contractLength or '' }}" id="contractLength_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="processDate_b2" class="col-sm-3 control-label">Process Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $electric3->processDate or '' }}" id="processDate_b2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate_b2" class="col-sm-3 control-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $electric3->startDate or '' }}" id="startDate_b2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="noticeDate_b2" class="col-sm-3 control-label">Notice Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $electric3->noticeDate or '' }}" id="noticeDate_b2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="expiryDate_b2" class="col-sm-3 control-label">Expiry Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $electric3->expiryDate or '' }}" id="expiryDate_b2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meterSerial_b2" class="col-sm-3 control-label">Meter Serial Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="meterSerial" class="form-control" placeholder="Meter Serial Number" value="{{ $electric3->meterSerial or '' }}" id="meterSerial_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startReading_b2" class="col-sm-3 control-label">Start Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="startReading" class="form-control" placeholder="Start Reading" value="{{ $electric3->startReading or '' }}" id="startReading_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endReading_b2" class="col-sm-3 control-label">End Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="endReading" class="form-control" placeholder="End Reading" value="{{ $electric3->endReading or '' }}" id="endReading_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dayUses_b2" class="col-sm-3 control-label">Day Usages</label>
                        <div class="col-sm-9">
                            <input type="text" name="dayUses" class="form-control" placeholder="Day Usages" value="{{ $electric3->dayUses or '' }}" id="dayUses_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="weekendUses_b2" class="col-sm-3 control-label">Evening /Weekend Usages</label>
                        <div class="col-sm-9">
                            <input type="text" name="weekendUses" class="form-control" placeholder="Evening /Weekend Usages" value="{{ $electric3->weekendUses or '' }}" id="weekendUses_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nightUses_b2" class="col-sm-3 control-label">Night Usages</label>
                        <div class="col-sm-9">
                            <input type="text" name="nightUses" class="form-control" placeholder="Night Usages" value="{{ $electric3->nightUses or '' }}" id="nightUses_b2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usesAQ_b2" class="col-sm-3 control-label">AQ (Usages (kWh)</label>
                        <div class="col-sm-9">
                            <input type="text" name="usesAQ" class="form-control" placeholder="AQ (Usages (kWh)" value="{{ $electric3->usesAQ or '' }}" id="usesAQ_b2" />
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