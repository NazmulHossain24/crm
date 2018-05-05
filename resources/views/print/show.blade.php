@extends('layouts.print')

@section('title')
    Customer Details
@endsection
@section('header')
    Customer Details
@endsection

@section('dates')
    <b>Date: </b>{{date('d/m/Y h:i a')}}
@endsection

@section('name')
    <b>Created By: </b>{{$table->creates['name']}} <br> <b>Process By: </b>{{$table->user['name']}} <br>
    @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
    <b>Process With: </b>{{$table->processWith}}
    @endif

@endsection


@section('content')

        @php

            $electric1 = $table->electric()->where('meterNo', 1)->first();
            $electric2 = $table->electric()->where('meterNo', 2)->first();
            $electric3 = $table->electric()->where('meterNo', 3)->first();

            $electric1_sec = count($electric1);
            $electric2_sec = count($electric2);
            $electric3_sec = count($electric3);

            $electric_count = $electric1_sec + $electric2_sec + $electric3_sec;

            $gas1 = $table->gas()->where('meterNo', 1)->first();
            $gas2 = $table->gas()->where('meterNo', 2)->first();
            $gas3 = $table->gas()->where('meterNo', 3)->first();

            $gas1_sec = count($gas1);
            $gas2_sec = count($gas2);
            $gas3_sec = count($gas3);

            $gas_count = $gas1_sec + $gas2_sec + $gas3_sec;

            $water1 = $table->water()->where('meterNo', 1)->first();
            $water2 = $table->water()->where('meterNo', 2)->first();
            $water3 = $table->water()->where('meterNo', 3)->first();

            $water1_sec = count($water1);
            $water2_sec = count($water2);
            $water3_sec = count($water3);

            $water_count = $water1_sec + $water2_sec + $water3_sec;


            $landLine = $table->land_line()->first();
            $broadband = $table->broadband()->first();
            $insurance = $table->insurance()->first();
            $ePos = $table->e_pos()->first();

            $company = $table->companies()->first();
            $payment = $table->payment()->first();
            $bill = $table->billing()->first();



        @endphp




        <div class="row" style="text-transform: uppercase;">
            <div class="col-xs-12 table-responsive table_align">

                <div class="saparate">
                <table class="table table-striped table-hover table-condensed table-bordered">
                    <tr>
                        <td colspan="2"><h4>Site Details</h4></th>
                    </tr>
                    <tr>
                        <td>Product Type</td>
                        <th>{{$table->productType}}</th>
                    </tr>
                    <tr>
                        <td>Contact Name</td>
                        <th class="text-danger">{{$table->contactName}}</th>
                    </tr>
                    <tr>
                        <td>Company Name</td>
                        <th class="text-danger">{{$table->companyName}}</th>
                    </tr>
                    <tr>
                        <td>Occupancy Type</td>
                        <th>{{$table->occupancyType}}</th>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <th>{{$table->buildingName}}, {{$table->street}}, {{$table->city}}, {{$table->country}}, {{$table->postCode}}</th>
                    </tr>

                    <tr>
                        <td>Land Line</td>
                        <th>{{$table->landLine}}</th>
                    </tr>
                    <tr>
                        <td>Mobile Number</td>
                        <th>{{$table->mobileNumber}}</th>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <th>{{$table->email}}</th>
                    </tr>
                    <!--
                    <tr>
                        <td>Happy to be contacted</td>
                        <th>{{$table->happy}}</th>
                    </tr>
                    <tr>
                        <td>Preferred Contact Method</td>
                        @if(isset($table->contactMethod))
                            <th>{{ implode(", ",unserialize($table->contactMethod))}}</th>
                        @else
                            <th></th>
                        @endif

                    </tr>
                    -->
                </table>
                </div>

                <div class="saparate">

                @if($electric1_sec > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <tr>
                            <td colspan="2">
                                @if($electric_count > 0)
                                    <h4>Electricity Supply</h4>
                                @endif
                                <h5>**Electric Meter 1:</h5>
                            </th>
                        </tr>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$electric1->company}}</th>
                        </tr>
                        <tr>
                            <td>Top Line</td>
                            <th>{{$electric1->topLine}}</th>
                        </tr>
                        <tr>
                            <td>MPAN</td>
                            <th>{{$electric1->mpan}}</th>
                        </tr>
                        <tr>
                            <td>Meter Serial Number</td>
                            <th>{{$electric1->meterSerial}}</th>
                        </tr>
                        <tr>
                            <td>Current Supply A/C</td>
                            <th>{{$electric1->currentAC}}</th>
                        </tr>
                        <tr>
                            <td>Standing Charge</td>
                            <th>{{$electric1->standingCharge}}</th>
                        </tr>
                        <tr>
                            <td>Unit Charge</td>
                            <th>{{$electric1->unitCharge}}</th>
                        </tr>
                        <tr>
                            <td>Day Unit</td>
                            <th>{{$electric1->dayUnit}}</th>
                        </tr>
                        <tr>
                            <td>Evening /Weekend Unit</td>
                            <th>{{$electric1->weekendUnit}}</th>
                        </tr>
                        <tr>
                            <td>Night Unit</td>
                            <th>{{$electric1->nightUnit}}</th>
                        </tr>
                        <tr>
                            <td>Up Lift</td>
                            <th>{{$electric1->upList}}</th>
                        </tr>
                        <tr>
                            <td>Length of Contract</td>
                            <th>{{$electric1->contractLength}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$electric1->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$electric1->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$electric1->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$electric1->expiryDate}}</th>
                        </tr>
                        
                        <tr>
                            <td>Start Reading</td>
                            <th>{{$electric1->startReading}}</th>
                        </tr>
                        <tr>
                            <td>End Reading</td>
                            <th>{{$electric1->endReading}}</th>
                        </tr>
                        <tr>
                            <td>Day Usages</td>
                            <th>{{$electric1->dayUses}}</th>
                        </tr>
                        <tr>
                            <td>Evening /Weekend Usages</td>
                            <th>{{$electric1->weekendUses}}</th>
                        </tr>
                        <tr>
                            <td>Night Usages</td>
                            <th>{{$electric1->nightUses}}</th>
                        </tr>
                        <tr>
                            <td>AQ (Usages (kWh)</td>
                            <th>{{$electric1->usesAQ}}</th>
                        </tr>

                    </table>
                @endif
                </div>


                <div class="saparate">
                @if($electric2_sec > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2">
                            @if($electric_count > 0)
                                <h4>Electricity Supply</h4>
                            @endif
                            <h5>**Electric Meter 2:</h5>
                        </th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$electric2->company}}</th>
                        </tr>
                        <tr>
                            <td>Top Line</td>
                            <th>{{$electric2->topLine}}</th>
                        </tr>
                        <tr>
                            <td>MPAN</td>
                            <th>{{$electric2->mpan}}</th>
                        </tr>
                        <tr>
                            <td>Meter Serial Number</td>
                            <th>{{$electric2->meterSerial}}</th>
                        </tr>
                        <tr>
                            <td>Current Supply A/C</td>
                            <th>{{$electric2->currentAC}}</th>
                        </tr>
                        <tr>
                            <td>Standing Charge</td>
                            <th>{{$electric2->standingCharge}}</th>
                        </tr>
                        <tr>
                            <td>Unit Charge</td>
                            <th>{{$electric2->unitCharge}}</th>
                        </tr>
                        <tr>
                            <td>Day Unit</td>
                            <th>{{$electric2->dayUnit}}</th>
                        </tr>
                        <tr>
                            <td>Evening /Weekend Unit</td>
                            <th>{{$electric2->weekendUnit}}</th>
                        </tr>
                        <tr>
                            <td>Night Unit</td>
                            <th>{{$electric2->nightUnit}}</th>
                        </tr>
                        <tr>
                            <td>Up Lift</td>
                            <th>{{$electric2->upList}}</th>
                        </tr>
                        <tr>
                            <td>Length of Contract</td>
                            <th>{{$electric2->contractLength}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$electric2->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$electric2->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$electric2->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$electric2->expiryDate}}</th>
                        </tr>
                        
                        <tr>
                            <td>Start Reading</td>
                            <th>{{$electric2->startReading}}</th>
                        </tr>
                        <tr>
                            <td>End Reading</td>
                            <th>{{$electric2->endReading}}</th>
                        </tr>
                        <tr>
                            <td>Day Usages</td>
                            <th>{{$electric2->dayUses}}</th>
                        </tr>
                        <tr>
                            <td>Evening /Weekend Usages</td>
                            <th>{{$electric2->weekendUses}}</th>
                        </tr>
                        <tr>
                            <td>Night Usages</td>
                            <th>{{$electric2->nightUses}}</th>
                        </tr>
                        <tr>
                            <td>AQ (Usages (kWh)</td>
                            <th>{{$electric2->usesAQ}}</th>
                        </tr>

                    </table>
                @endif
                </div>


                <div class="saparate">
                @if($electric3_sec > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2">
                            @if($electric_count > 0)
                                <h4>Electricity Supply</h4>
                            @endif
                            <h5>**Electric Meter 3:</h5>
                        </th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$electric3->company}}</th>
                        </tr>
                        <tr>
                            <td>Top Line</td>
                            <th>{{$electric3->topLine}}</th>
                        </tr>
                        <tr>
                            <td>MPAN</td>
                            <th>{{$electric3->mpan}}</th>
                        </tr>
                        <tr>
                            <td>Meter Serial Number</td>
                            <th>{{$electric3->meterSerial}}</th>
                        </tr>
                        <tr>
                            <td>Current Supply A/C</td>
                            <th>{{$electric3->currentAC}}</th>
                        </tr>
                        <tr>
                            <td>Standing Charge</td>
                            <th>{{$electric3->standingCharge}}</th>
                        </tr>
                        <tr>
                            <td>Unit Charge</td>
                            <th>{{$electric3->unitCharge}}</th>
                        </tr>
                        <tr>
                            <td>Day Unit</td>
                            <th>{{$electric3->dayUnit}}</th>
                        </tr>
                        <tr>
                            <td>Evening /Weekend Unit</td>
                            <th>{{$electric3->weekendUnit}}</th>
                        </tr>
                        <tr>
                            <td>Night Unit</td>
                            <th>{{$electric3->nightUnit}}</th>
                        </tr>
                        <tr>
                            <td>Up Lift</td>
                            <th>{{$electric3->upList}}</th>
                        </tr>
                        <tr>
                            <td>Length of Contract</td>
                            <th>{{$electric3->contractLength}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$electric3->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$electric3->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$electric3->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$electric3->expiryDate}}</th>
                        </tr>
                        
                        <tr>
                            <td>Start Reading</td>
                            <th>{{$electric3->startReading}}</th>
                        </tr>
                        <tr>
                            <td>End Reading</td>
                            <th>{{$electric3->endReading}}</th>
                        </tr>
                        <tr>
                            <td>Day Usages</td>
                            <th>{{$electric3->dayUses}}</th>
                        </tr>
                        <tr>
                            <td>Evening /Weekend Usages</td>
                            <th>{{$electric3->weekendUses}}</th>
                        </tr>
                        <tr>
                            <td>Night Usages</td>
                            <th>{{$electric3->nightUses}}</th>
                        </tr>
                        <tr>
                            <td>AQ (Usages (kWh)</td>
                            <th>{{$electric3->usesAQ}}</th>
                        </tr>

                    </table>
                @endif
                </div>

                <div class="saparate">

                @if($gas1_sec > 0)

                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2">
                            @if($gas_count > 0)
                                <h4>Gas Supply</h4>
                            @endif
                                <h5>**Gas Meter 1:</h5>
                        </th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$gas1->company}}</th>
                        </tr>
                        <tr>
                            <td>Current Supply A/C</td>
                            <th>{{$gas1->currentAC}}</th>
                        </tr>
                        <tr>
                            <td>MPR</td>
                            <th>{{$gas1->mpr}}</th>
                        </tr>
                        <tr>
                            <td>Meter Serial Number</td>
                            <th>{{$gas1->meterSerial}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$gas1->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$gas1->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$gas1->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Up Lift</td>
                            <th>{{$gas1->upList}}</th>
                        </tr>
                        <tr>
                            <td>Standing Charge</td>
                            <th>{{$gas1->standingCharge}}</th>
                        </tr>
                        <tr>
                            <td>Unit Charge</td>
                            <th>{{$gas1->unitCharge}}</th>
                        </tr>

                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$gas1->expiryDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Reading</td>
                            <th>{{$gas1->startReading}}</th>
                        </tr>
                        <tr>
                            <td>End Reading</td>
                            <th>{{$gas1->endReading}}</th>
                        </tr>
                        <tr>
                            <td>AQ (Usages (kWh)</td>
                            <th>{{$gas1->usesAQ}}</th>
                        </tr>
                    </table>
                @endif
                </div>


                <div class="saparate">
                @if($gas2_sec > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2">
                            @if($gas_count > 0)
                                <h4>Gas Supply</h4>
                            @endif
                            <h5>**Gas Meter 2:</h5>
                        </th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$gas2->company}}</th>
                        </tr>
                        <tr>
                            <td>Current Supply A/C</td>
                            <th>{{$gas2->currentAC}}</th>
                        </tr>
                        <tr>
                            <td>MPR</td>
                            <th>{{$gas2->mpr}}</th>
                        </tr>
                        <tr>
                            <td>Meter Serial Number</td>
                            <th>{{$gas2->meterSerial}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$gas2->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$gas2->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$gas2->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Up Lift</td>
                            <th>{{$gas2->upList}}</th>
                        </tr>

                        <tr>
                            <td>Standing Charge</td>
                            <th>{{$gas2->standingCharge}}</th>
                        </tr>
                        <tr>
                            <td>Unit Charge</td>
                            <th>{{$gas2->unitCharge}}</th>
                        </tr>

                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$gas2->expiryDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Reading</td>
                            <th>{{$gas2->startReading}}</th>
                        </tr>
                        <tr>
                            <td>End Reading</td>
                            <th>{{$gas2->endReading}}</th>
                        </tr>
                        <tr>
                            <td>AQ (Usages (kWh)</td>
                            <th>{{$gas2->usesAQ}}</th>
                        </tr>
                    </table>
                @endif
                </div>

                <div class="saparate">
                @if($gas3_sec > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2">
                            @if($gas_count > 0)
                                <h4>Gas Supply</h4>
                            @endif
                            <h5>**Gas Meter 3:</h5>
                        </th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$gas3->company}}</th>
                        </tr>
                        <tr>
                            <td>Current Supply A/C</td>
                            <th>{{$gas3->currentAC}}</th>
                        </tr>
                        <tr>
                            <td>MPR</td>
                            <th>{{$gas3->mpr}}</th>
                        </tr>
                        <tr>
                            <td>Meter Serial Number</td>
                            <th>{{$gas3->meterSerial}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$gas3->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$gas3->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$gas3->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Up Lift</td>
                            <th>{{$gas3->upList}}</th>
                        </tr>
                        <tr>
                            <td>Standing Charge</td>
                            <th>{{$gas3->standingCharge}}</th>
                        </tr>
                        <tr>
                            <td>Unit Charge</td>
                            <th>{{$gas3->unitCharge}}</th>
                        </tr>

                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$gas3->expiryDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Reading</td>
                            <th>{{$gas3->startReading}}</th>
                        </tr>
                        <tr>
                            <td>End Reading</td>
                            <th>{{$gas3->endReading}}</th>
                        </tr>
                        <tr>
                            <td>AQ (Usages (kWh)</td>
                            <th>{{$gas3->usesAQ}}</th>
                        </tr>
                    </table>
                @endif
                </div>


                <div class="saparate">

                @if($water1_sec > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2">
                            @if($water_count > 0)
                                <h4>Water Supply</h4>
                            @endif
                                <h5>**Water Meter 1:</h5>
                        </th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$water1->company}}</th>
                        </tr>
                        <tr>
                            <td>Account</td>
                            <th>{{$water1->account}}</th>
                        </tr>
                        <tr>
                            <td>Standing Charge</td>
                            <th>{{$water1->standingCharge}}</th>
                        </tr>
                        <tr>
                            <td>Unit Charge</td>
                            <th>{{$water1->unitCharge}}</th>
                        </tr>
                        <tr>
                            <td>Contract Length</td>
                            <th>{{$water1->contractLength}}</th>
                        </tr>
                        <tr>
                            <td>Meter Serial Number</td>
                            <th>{{$water1->meterSerial}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$water1->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$water1->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$water1->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$water1->expiryDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Reading</td>
                            <th>{{$water1->startReading}}</th>
                        </tr>
                        <tr>
                            <td>End Reading</td>
                            <th>{{$water1->endReading}}</th>
                        </tr>
                        <tr>
                            <td>AQ Usages (kWh):</td>
                            <th>{{$water1->usesAQ}}</th>
                        </tr>
                    </table>
                @endif
                </div>


                <div class="saparate">
                @if($water2_sec > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2">
                            @if($water_count > 0)
                                <h4>Water Supply</h4>
                            @endif
                            <h5>**Water Meter 2:</h5>
                        </th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$water2->company}}</th>
                        </tr>
                        <tr>
                            <td>Account</td>
                            <th>{{$water2->account}}</th>
                        </tr>
                        <tr>
                            <td>Standing Charge</td>
                            <th>{{$water2->standingCharge}}</th>
                        </tr>
                        <tr>
                            <td>Unit Charge</td>
                            <th>{{$water2->unitCharge}}</th>
                        </tr>
                        <tr>
                            <td>Contract Length</td>
                            <th>{{$water2->contractLength}}</th>
                        </tr>
                        <tr>
                            <td>Meter Serial Number</td>
                            <th>{{$water2->meterSerial}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$water2->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$water2->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$water2->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$water2->expiryDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Reading</td>
                            <th>{{$water2->startReading}}</th>
                        </tr>
                        <tr>
                            <td>End Reading</td>
                            <th>{{$water2->endReading}}</th>
                        </tr>
                        <tr>
                            <td>AQ Usages (kWh):</td>
                            <th>{{$water2->usesAQ}}</th>
                        </tr>
                    </table>
                @endif
                </div>


                <div class="saparate">
                @if($water3_sec > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2">
                            @if($water_count > 0)
                                <h4>Water Supply</h4>
                            @endif
                            <h5>**Water Meter 3:</h5>
                        </th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$water3->company}}</th>
                        </tr>
                        <tr>
                            <td>Account</td>
                            <th>{{$water3->account}}</th>
                        </tr>
                        <tr>
                            <td>Standing Charge</td>
                            <th>{{$water3->standingCharge}}</th>
                        </tr>
                        <tr>
                            <td>Unit Charge</td>
                            <th>{{$water3->unitCharge}}</th>
                        </tr>
                        <tr>
                            <td>Contract Length</td>
                            <th>{{$water3->contractLength}}</th>
                        </tr>
                        <tr>
                            <td>Meter Serial Number</td>
                            <th>{{$water3->meterSerial}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$water3->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$water3->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$water3->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$water3->expiryDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Reading</td>
                            <th>{{$water3->startReading}}</th>
                        </tr>
                        <tr>
                            <td>End Reading</td>
                            <th>{{$water3->endReading}}</th>
                        </tr>
                        <tr>
                            <td>AQ Usages (kWh):</td>
                            <th>{{$water3->usesAQ}}</th>
                        </tr>
                    </table>
                @endif
                </div>

                <div class="saparate">
                @if(count($landLine) > 0)

                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2"><h4>Land Line</h4></th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$landLine->company}}</th>
                        </tr>
                        <tr>
                            <td>Account</td>
                            <th>{{$landLine->account}}</th>
                        </tr>
                        <tr>
                            <td>Telephone Number</td>
                            <th>{{$landLine->telephoneNumber}}</th>
                        </tr>
                        <tr>
                            <td>Package</td>
                            <th>{{$landLine->package}}</th>
                        </tr>
                        <tr>
                            <td>Contract Length</td>
                            <th>{{$landLine->contractLength}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$landLine->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$landLine->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$landLine->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$landLine->expiryDate}}</th>
                        </tr>
                    </table>
                @endif
                </div>


                <div class="saparate">
                @if(count($broadband) > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2"><h4>Broadband</h4></th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$broadband->company}}</th>
                        </tr>
                        <tr>
                            <td>Account</td>
                            <th>{{$broadband->account}}</th>
                        </tr>
                        <tr>
                            <td>Telephone Number</td>
                            <th>{{$broadband->telephoneNumber}}</th>
                        </tr>
                        <tr>
                            <td>Package</td>
                            <th>{{$broadband->package}}</th>
                        </tr>
                        <tr>
                            <td>Contract Length</td>
                            <th>{{$broadband->contractLength}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$broadband->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$broadband->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$broadband->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$broadband->expiryDate}}</th>
                        </tr>
                    </table>
                @endif
                </div>


                <div class="saparate">
                @if(count($insurance) > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2"><h4>Insurance</h4></th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$insurance->company}}</th>
                        </tr>
                        <tr>
                            <td>Account</td>
                            <th>{{$insurance->account}}</th>
                        </tr>
                        <tr>
                            <td>Old Charge</td>
                            <th>{{$insurance->oldCharge}}</th>
                        </tr>
                        <tr>
                            <td>New Charge</td>
                            <th>{{$insurance->newCharge}}</th>
                        </tr>
                        <tr>
                            <td>Contract Length</td>
                            <th>{{$insurance->contractLength}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$insurance->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$insurance->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$insurance->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$insurance->expiryDate}}</th>
                        </tr>
                    </table>
                @endif
                </div>

                <div class="saparate">
                @if(count($ePos) > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2"><h4>E-POS</h4></th>
                        <tr>
                            <td>Current Supplier</td>
                            <th>{{$ePos->company}}</th>
                        </tr>
                        <tr>
                            <td>Account</td>
                            <th>{{$ePos->account}}</th>
                        </tr>
                        <tr>
                            <td>Setup Charge</td>
                            <th>{{$ePos->setupCharge}}</th>
                        </tr>
                        <tr>
                            <td>Weekly Charge</td>
                            <th>{{$ePos->setupCharge}}</th>
                        </tr>
                        <tr>
                            <td>One Of</td>
                            <th>{{$ePos->oneOf}}</th>
                        </tr>
                        <tr>
                            <td>Descriptions</td>
                            <th>{{$ePos->descriptions}}</th>
                        </tr>
                        <tr>
                            <td>Contract Length</td>
                            <th>{{$ePos->contractLength}}</th>
                        </tr>
                        <tr>
                            <td>Process Date</td>
                            <th>{{$ePos->processDate}}</th>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <th>{{$ePos->startDate}}</th>
                        </tr>
                        <tr>
                            <td>Notice Date</td>
                            <th class="text-danger">{{$ePos->noticeDate}}</th>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <th class="text-danger">{{$ePos->expiryDate}}</th>
                        </tr>
                    </table>
                @endif
                </div>


                <div class="saparate">
                @if(count($company) > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2"><h4>Company Details</h4></th>
                        <tr>
                            <td>Company Status</td>
                            <th>{{$company->companyStatus}}</th>
                        </tr>
                        <tr>
                            <td>Company Number</td>
                            <th>{{$company->companyNumber}}</th>
                        </tr>
                        <tr>
                            <td>SIC Description</td>
                            <th>{{$company->sicDescription}}</th>
                        </tr>
                        <tr>
                            <td>Job Title</td>
                            <th>{{$company->jobTitle}}</th>
                        </tr>

                        @if($company->companyStatus == 'Sole Trader')
                                <tr>
                                    <td>Date Of Birth</td>
                                    <th>{{$company->dob1}}</th>
                                </tr>
                                <tr>
                                    <td>House Number/Name</td>
                                    <th>{{$company->house_number1}}</th>
                                </tr>
                                <tr>
                                    <td>Home Street</td>
                                    <th>{{$company->home_street1}}</th>
                                </tr>
                                <tr>
                                    <td>Home Town</td>
                                    <th>{{$company->home_town1}}</th>
                                </tr>
                                <tr>
                                    <td>Home Country</td>
                                    <th>{{$company->home_country1}}</th>
                                </tr>
                                <tr>
                                    <td>Home Post Code</td>
                                    <th>{{$company->home_post1}}</th>
                                </tr>
                                <tr>
                                    <td>Years at Address</td>
                                    <th>{{$company->address1}}</th>
                                </tr>
                                <tr>
                                    <td>House Number/Name</td>
                                    <th>{{$company->house_number_s1}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Street</td>
                                    <th>{{$company->street_s1}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Town</td>
                                    <th>{{$company->town_s1}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Country</td>
                                    <th>{{$company->home_country_s1}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Post Code</td>
                                    <th>{{$company->post_s1}}</th>
                                </tr>
                                <tr>
                                    <td>Years at Address</td>
                                    <th>{{$company->address_s1}}</th>
                                </tr>
                            @elseif($company->companyStatus == 'Partnership')

                                <tr>
                                    <td>Date Of Birth</td>
                                    <th>{{$company->dob2}}</th>
                                </tr>
                                <tr>
                                    <td>House Number/Name</td>
                                    <th>{{$company->house_number2}}</th>
                                </tr>
                                <tr>
                                    <td>Home Street</td>
                                    <th>{{$company->home_street2}}</th>
                                </tr>
                                <tr>
                                    <td>Home Town</td>
                                    <th>{{$company->home_town2}}</th>
                                </tr>
                                <tr>
                                    <td>Home Country</td>
                                    <th>{{$company->home_country2}}</th>
                                </tr>
                                <tr>
                                    <td>Home Post Code</td>
                                    <th>{{$company->home_post2}}</th>
                                </tr>
                                <tr>
                                    <td>Years at Address</td>
                                    <th>{{$company->address2}}</th>
                                </tr>
                                <tr>
                                    <td>House Number/Name</td>
                                    <th>{{$company->house_number_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Street</td>
                                    <th>{{$company->street_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Town</td>
                                    <th>{{$company->town_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Country</td>
                                    <th>{{$company->home_country_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Post Code</td>
                                    <th>{{$company->post_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Years at Address</td>
                                    <th>{{$company->address_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Other Partner Name</td>
                                    <th>{{$company->other_partner}}</th>
                                </tr>
                                <tr>
                                    <td>Date Of Birth</td>
                                    <th>{{$company->other_dob2}}</th>
                                </tr>
                                <tr>
                                    <td>House Number/Name</td>
                                    <th>{{$company->other_house_number2}}</th>
                                </tr>
                                <tr>
                                    <td>Home Street</td>
                                    <th>{{$company->other_home_street2}}</th>
                                </tr>
                                <tr>
                                    <td>Home Town</td>
                                    <th>{{$company->other_home_town2}}</th>
                                </tr>
                                <tr>
                                    <td>Home Country</td>
                                    <th>{{$company->other_home_country2}}</th>
                                </tr>
                                <tr>
                                    <td>Home Post Code</td>
                                    <th>{{$company->other_home_post2}}</th>
                                </tr>
                                <tr>
                                    <td>Years at Address</td>
                                    <th>{{$company->other_address2}}</th>
                                </tr>
                                <tr>
                                    <td>House Number/Name</td>
                                    <th>{{$company->other_house_number_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Street</td>
                                    <th>{{$company->other_street_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Town</td>
                                    <th>{{$company->other_town_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Country</td>
                                    <th>{{$company->other_home_country_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Post Code</td>
                                    <th>{{$company->other_post_s2}}</th>
                                </tr>
                                <tr>
                                    <td>Years at Address</td>
                                    <th>{{$company->other_address_s2}}</th>
                                </tr>
                            @else
                                <tr>
                                    <td>Years at Address</td>
                                    <th>{{$company->address}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Street & Number</td>
                                    <th>{{$company->street}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Town</td>
                                    <th>{{$company->town}}</th>
                                </tr>
                                <tr>
                                    <td>Previous Post Code</td>
                                    <th>{{$company->postCode}}</th>
                                </tr>
                        @endif

                    </table>
                @endif
                </div>

                @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1) <!-- Only Su Admin Can See-->

                <div class="saparate">
                @if(count($bill) > 0)

                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2"><h4>Billing Details</h4></th>
                        <tr>
                            <td>Billing Building Name/Number</td>
                            <th>{{$bill->buildingNumber}}</th>
                        </tr>
                        <tr>
                            <td>Billing Number & Street</td>
                            <th>{{$bill->street}}</th>
                        </tr>
                        <tr>
                            <td>Billing Town/City</td>
                            <th>{{$bill->town}}</th>
                        </tr>
                        <tr>
                            <td>Billing Country</td>
                            <th>{{$bill->country}}</th>
                        </tr>
                        <tr>
                            <td>Billing Post Code</td>
                            <th>{{$bill->postCode}}</th>
                        </tr>
                    </table>
                @endif
                </div>

                <div class="saparate">
                @if(count($payment) > 0)
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <td colspan="2"><h4>Payment Details</h4></th>
                        <tr>
                            <td>Payment Method</td>
                            <th>{{$payment->paymentMethod}}</th>
                        </tr>
                        <tr>
                            <td>Billing Frequency</td>
                            <th>{{$payment->billingFrequency}}</th>
                        </tr>
                        <tr>
                            <td>Bank Name</td>
                            <th>{{$payment->bankName}}</th>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <th>{{$payment->accountNumber}}</th>
                        </tr>
                        <tr>
                            <td>Short Code</td>
                            <th>{{$payment->shortCode}}</th>
                        </tr>
                        <tr>
                            <td>Account Name</td>
                            <th>{{$payment->accountName}}</th>
                        </tr>
                    </table>
                    @endif
                </div>

                @endif <!-- Only Admin Can See-->

    </div>
</div>
@endsection