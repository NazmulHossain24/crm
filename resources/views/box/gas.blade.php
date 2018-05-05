@php

    if(isset($site->siteID)){
        $gas1 = $site->gas()->where('meterNo', 1)->first();
        $gas2 = $site->gas()->where('meterNo', 2)->first();
        $gas3 = $site->gas()->where('meterNo', 3)->first();
    }

@endphp
<div id="gasMeter1" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Gas Meter 1</h4>
            </div>
            <form id="gasFrom1" action="{{action('GasController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
                <input type="hidden" name="meterNo" value="1" >
                <input type="hidden" class="gasSupplyID1" name="gasSupplyID" value="{{ $gas1->gasSupplyID or '' }}">

                <div class="modal-body box-overflow">
                    @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <div class="form-group">
                            <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                            <div class="col-sm-9">
                                <select name="processWith" class="form-control" id="processWith_a">
                                    <option value="">Process With...</option>
                                    @foreach($process as $row)
                                        @if(isset($gas1->processWith))
                                            <option value="{{$row->name}}" {{ $gas1->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>


                        </div>
                    @endif

                    <div class="form-group">
                        <label for="company_c" class="col-sm-3 control-label">Current Supplier</label>
                        <div class="col-sm-9">
                            <select name="company" class="form-control" id="company_c">
                                @foreach($table as $row)
                                    @if(isset($gas1->company))
                                        <option value="{{$row->name}}" {{ $gas1->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="currentAC_c" class="col-sm-3 control-label">Current Supply A/C</label>
                        <div class="col-sm-9">
                            <input type="text" name="currentAC" class="form-control" placeholder="Current Supply A/C" value="{{ $gas1->currentAC or '' }}" id="currentAC_c" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mpr_c" class="col-sm-3 control-label">MPR</label>
                        <div class="col-sm-9">
                            <input type="text" name="mpr" class="form-control" placeholder="MPR" value="{{ $gas1->mpr or '' }}" id=mpr_c" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meterSerial_c" class="col-sm-3 control-label">Meter Serial Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="meterSerial" class="form-control" placeholder="Meter Serial Number" value="{{ $gas1->meterSerial or '' }}" id="meterSerial_c" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="processDate_c" class="col-sm-3 control-label">Process Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $gas1->processDate or '' }}" id="processDate_c" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate_c" class="col-sm-3 control-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $gas1->startDate or '' }}" id="startDate_c"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="noticeDate_c" class="col-sm-3 control-label">Notice Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $gas1->noticeDate or '' }}" id="noticeDate_c"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="upList_c" class="col-sm-3 control-label">Up Lift</label>
                        <div class="col-sm-9">
                            <input type="text" name="upList" class="form-control" placeholder="Up Lift" value="{{ $gas1->upList or '' }}" id="upList_c" />
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="standingCharge_c" class="col-sm-3 control-label">Standing Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="standingCharge" class="form-control" placeholder="Standing Charge" value="{{ $gas1->standingCharge or '' }}" id="standingCharge_c" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitCharge_c" class="col-sm-3 control-label">Unit Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="unitCharge" class="form-control" placeholder="Unit Charge" value="{{ $gas1->unitCharge or '' }}" id="unitCharge_c" />
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="expiryDate_c" class="col-sm-3 control-label">Expiry Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $gas1->expiryDate or '' }}" id="expiryDate_c"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startReading_c" class="col-sm-3 control-label">Start Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="startReading" class="form-control" placeholder="Start Reading" value="{{ $gas1->startReading or '' }}" id="startReading_c" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endReading_c" class="col-sm-3 control-label">End Reading:</label>
                        <div class="col-sm-9">
                            <input type="text" name="endReading" class="form-control" placeholder="End Reading" value="{{ $gas1->endReading or '' }}" id="endReading_c" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usesAQ_c" class="col-sm-3 control-label">AQ (Usages (kWh):</label>
                        <div class="col-sm-9">
                            <input type="text" name="usesAQ" class="form-control" placeholder="AQ (Usages (kWh)" value="{{ $gas1->usesAQ or '' }}" id="usesAQ_c" />
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


<div id="gasMeter2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Gas Meter 2</h4>
            </div>
            <form id="gasFrom2" action="{{action('GasController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
                <input type="hidden" name="meterNo" value="2" >
                <input type="hidden" class="gasSupplyID2" name="gasSupplyID" value="{{ $gas2->gasSupplyID or '' }}">

                <div class="modal-body box-overflow">

                    @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <div class="form-group">
                            <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                            <div class="col-sm-9">
                                <select name="processWith" class="form-control" id="processWith_a">
                                    <option value="">Process With...</option>
                                    @foreach($process as $row)
                                        @if(isset($gas2->processWith))
                                            <option value="{{$row->name}}" {{ $gas2->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>


                        </div>
                    @endif

                    <div class="form-group">
                        <label for="company_c1" class="col-sm-3 control-label">Current Supplier</label>
                        <div class="col-sm-9">
                            <select name="company" class="form-control" id="company_c1">
                                @foreach($table as $row)
                                    @if(isset($gas2->company))
                                        <option value="{{$row->name}}" {{ $gas2->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="currentAC_c1" class="col-sm-3 control-label">Current Supply A/C</label>
                        <div class="col-sm-9">
                            <input type="text" name="currentAC" class="form-control" placeholder="Current Supply A/C" value="{{ $gas2->currentAC or '' }}" id="currentAC_c1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mpr_c1" class="col-sm-3 control-label">MPR</label>
                        <div class="col-sm-9">
                            <input type="text" name="mpr" class="form-control" placeholder="MPR" value="{{ $gas2->mpr or '' }}" id="mpr_c1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meterSerial_c1" class="col-sm-3 control-label">Meter Serial Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="meterSerial" class="form-control" placeholder="Meter Serial Number" value="{{ $gas2->meterSerial or '' }}" id="meterSerial_c1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="processDate_c1" class="col-sm-3 control-label">Process Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $gas2->processDate or '' }}" id="processDate_c1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate_c1" class="col-sm-3 control-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $gas2->startDate or '' }}" value="{{ $gas2->gasSupplyID or '' }}" id="startDate_c1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="noticeDate_c1" class="col-sm-3 control-label">Notice Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $gas2->noticeDate or '' }}" id="noticeDate_c1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="upList_c1" class="col-sm-3 control-label">Up Lift</label>
                        <div class="col-sm-9">
                            <input type="text" name="upList" class="form-control" placeholder="Up Lift" value="{{ $gas2->upList or '' }}" id="upList_c1" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="standingCharge_c1" class="col-sm-3 control-label">Standing Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="standingCharge" class="form-control" placeholder="Standing Charge" value="{{ $gas2->standingCharge or '' }}" id="standingCharge_c1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitCharge_c1" class="col-sm-3 control-label">Unit Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="unitCharge" class="form-control" placeholder="Unit Charge" value="{{ $gas2->unitCharge or '' }}" id="unitCharge_c1" />
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="expiryDate_c1" class="col-sm-3 control-label">Expiry Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $gas2->expiryDate or '' }}" id="expiryDate_c1"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startReading_c1" class="col-sm-3 control-label">Start Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="startReading" class="form-control" placeholder="Start Reading" value="{{ $gas2->startReading or '' }}" id="startReading_c1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endReading_c1" class="col-sm-3 control-label">End Reading:</label>
                        <div class="col-sm-9">
                            <input type="text" name="endReading" class="form-control" placeholder="End Reading" value="{{ $gas2->endReading or '' }}" id="endReading_c1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usesAQ_c1" class="col-sm-3 control-label">AQ (Usages (kWh):</label>
                        <div class="col-sm-9">
                            <input type="text" name="usesAQ" class="form-control" placeholder="AQ (Usages (kWh)" value="{{ $gas2->usesAQ or '' }}" id="usesAQ_c1" />
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



<div id="gasMeter3" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Gas Meter 3</h4>
            </div>
            <form id="gasFrom3" action="{{action('GasController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
                <input type="hidden" name="meterNo" value="3" >
                <input type="hidden" class="gasSupplyID3" name="gasSupplyID" value="{{ $gas3->gasSupplyID or '' }}">

                <div class="modal-body box-overflow">

                    @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <div class="form-group">
                            <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                            <div class="col-sm-9">
                                <select name="processWith" class="form-control" id="processWith_a">
                                    <option value="">Process With...</option>
                                    @foreach($process as $row)
                                        @if(isset($gas3->processWith))
                                            <option value="{{$row->name}}" {{ $gas3->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>


                        </div>
                    @endif

                    <div class="form-group">
                        <label for="company_c2" class="col-sm-3 control-label">Current Supplier</label>
                        <div class="col-sm-9">
                            <select name="company" class="form-control" id="company_c2">
                                @foreach($table as $row)
                                    @if(isset($gas3->company))
                                        <option value="{{$row->name}}" {{ $gas3->company == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="currentAC_c2" class="col-sm-3 control-label">Current Supply A/C</label>
                        <div class="col-sm-9">
                            <input type="text" name="currentAC" class="form-control" placeholder="Current Supply A/C" value="{{ $gas3->currentAC or '' }}" id="currentAC_c2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mpr_c2" class="col-sm-3 control-label">MPR</label>
                        <div class="col-sm-9">
                            <input type="text" name="mpr" class="form-control" placeholder="MPR" value="{{ $gas3->mpr or '' }}" id="mpr_c2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meterSerial_c2" class="col-sm-3 control-label">Meter Serial Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="meterSerial" class="form-control" placeholder="Meter Serial Number" value="{{ $gas3->meterSerial or '' }}" id="meterSerial_c2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="processDate_c2" class="col-sm-3 control-label">Process Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="processDate" class="form-control" placeholder="Process Date" value="{{ $gas3->processDate or '' }}" id="processDate_c2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate_c2" class="col-sm-3 control-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="startDate" class="form-control" placeholder="Start Date" value="{{ $gas3->startDate or '' }}" id="startDate_c2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="noticeDate_c2" class="col-sm-3 control-label">Notice Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="noticeDate" class="form-control" placeholder="Notice Date" value="{{ $gas3->noticeDate or '' }}" id="noticeDate_c2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="upList_c2" class="col-sm-3 control-label">Up Lift</label>
                        <div class="col-sm-9">
                            <input type="text" name="upList" class="form-control" placeholder="Up Lift" value="{{ $gas3->upList or '' }}" id="upList_c2" />
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="standingCharge_c2" class="col-sm-3 control-label">Standing Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="standingCharge" class="form-control" placeholder="Standing Charge" value="{{ $gas3->standingCharge or '' }}" id="standingCharge_c2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitCharge_c2" class="col-sm-3 control-label">Unit Charge</label>
                        <div class="col-sm-9">
                            <input type="text" name="unitCharge" class="form-control" placeholder="Unit Charge" value="{{ $gas3->unitCharge or '' }}" id="unitCharge_c2" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="expiryDate_c2" class="col-sm-3 control-label">Expiry Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="expiryDate" class="form-control" placeholder="Expiry Date" value="{{ $gas3->expiryDate or '' }}" id="expiryDate_c2"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startReading_c2" class="col-sm-3 control-label">Start Reading</label>
                        <div class="col-sm-9">
                            <input type="text" name="startReading" class="form-control" placeholder="Start Reading" value="{{ $gas3->startReading or '' }}" id="startReading_c2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endReading_c2" class="col-sm-3 control-label">End Reading:</label>
                        <div class="col-sm-9">
                            <input type="text" name="endReading" class="form-control" placeholder="End Reading" value="{{ $gas3->endReading or '' }}" id="endReading_c2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usesAQ_c2" class="col-sm-3 control-label">AQ (Usages (kWh):</label>
                        <div class="col-sm-9">
                            <input type="text" name="usesAQ" class="form-control" placeholder="AQ (Usages (kWh)" value="{{ $gas3->usesAQ or '' }}" id="usesAQ_c2" />
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

