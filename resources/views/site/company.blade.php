@php

    if(isset($site->siteID)){
        $company = $site->companies()->first();
    }

@endphp
<div class="box box-success" xmlns="http://www.w3.org/1999/html">
    <div class="box-header with-border">
        <i class="fa fa-bank"></i>
        <h3 class="box-title">Company Details</h3>
    </div>
    <form id="companyDetailsFrom" action="{{action('CompanyDetailsController@save')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
        <input type="hidden" class="companyDetailsID" name="companyDetailsID" value="{{ $company->companyDetailsID or '' }}">

        <div class="box-body">

            <div class="form-group">
                <label for="companyStatus_e" class="col-sm-3 control-label">Company Status</label>
                <div class="col-sm-9">
                    @if(isset($company->companyStatus))
                        <select name="companyStatus" class="form-control" id="companyStatus_e">
                            <option value="Sole Trader"{{ $company->companyStatus == 'Sole Trader' ? "selected" : "" }}>Sole Trader</option>
                            <option value="Limited" {{ $company->companyStatus == 'Limited' ? "selected" : "" }}>Limited</option>
                            <option value="PLC" {{ $company->companyStatus == 'PLC' ? "selected" : "" }}>PLC</option>
                            <option value="Limited Liability" {{ $company->companyStatus == 'Limited Liability' ? "selected" : "" }}>Limited Liability</option>
                            <option value="Partnership" {{ $company->companyStatus == 'Partnership' ? "selected" : "" }}>Partnership</option>
                            <option value="Charity" {{ $company->companyStatus == 'Charity' ? "selected" : "" }}>Charity</option>
                            <option value="Public Sector" {{ $company->companyStatus == 'Public Sector' ? "selected" : "" }}>Public Sector</option>
                        </select>
                    @else
                        <select name="companyStatus" class="form-control" id="companyStatus_e">
                            <option value="Sole Trader">Sole Trader</option>
                            <option value="Limited">Limited</option>
                            <option value="PLC">PLC</option>
                            <option value="Limited Liability">Limited Liability</option>
                            <option value="Partnership">Partnership</option>
                            <option value="Charity">Charity</option>
                            <option value="Public Sector">Public Sector</option>
                        </select>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="companyNumber_e" class="col-sm-3 control-label">Company Number</label>
                <div class="col-sm-9">
                    <input type="text" name="companyNumber" class="form-control" placeholder="Company Number" value="{{ $company->companyNumber or '' }}" id="companyNumber_e" />
                </div>
            </div>

            <div class="form-group">
                <label for="sicDescription_e" class="col-sm-3 control-label">SIC Description</label>
                <div class="col-sm-9">

                    @if(isset($company->sicDescription))

                        <select name="sicDescription" class="form-control" id="sicDescription_e">
                            <option value="Agriculture, Hunting &amp; Forestry" {{ $company->sicDescription == 'Agriculture, Hunting &amp; Forestry' ? "selected" : "" }}>Agriculture, Hunting &amp; Forestry</option>
                            <option value="Fishing" {{ $company->sicDescription == 'Fishing' ? "selected" : "" }}>Fishing</option>
                            <option value="Mining &amp; Quarrying" {{ $company->sicDescription == 'Mining &amp; Quarrying' ? "selected" : "" }}>Mining &amp; Quarrying</option>
                            <option value="Manufacturing" {{ $company->sicDescription == 'Manufacturing' ? "selected" : "" }}>Manufacturing</option>
                            <option value="Electricity, Gas &amp; Water Supply" {{ $company->sicDescription == 'Electricity, Gas &amp; Water Supply' ? "selected" : "" }}>Electricity, Gas &amp; Water Supply</option>
                            <option value="Construction" {{ $company->sicDescription == 'Construction' ? "selected" : "" }}>Construction</option>
                            <option value="Wholesale &amp; Retail" {{ $company->sicDescription == 'Wholesale' ? "selected" : "" }}>Wholesale &amp; Retail</option>
                            <option value="Hotel &amp; Restaurants &amp; Bars" {{ $company->sicDescription == 'Hotel &amp; Restaurants &amp; Bars' ? "selected" : "" }}>Hotel &amp; Restaurants &amp; Bars</option>
                            <option value="Transport, Storage and Communication" {{ $company->sicDescription == 'Transport, Storage and Communication' ? "selected" : "" }}>Transport, Storage and Communication</option>
                            <option value="Financial Intermediation" {{ $company->sicDescription == 'Financial Intermediation' ? "selected" : "" }}>Financial Intermediation</option>
                            <option value="Real Estate, Renting and Business" {{ $company->sicDescription == 'Real Estate, Renting and Business' ? "selected" : "" }}>Real Estate, Renting and Business</option>
                            <option value="Public Administration and Defence" {{ $company->sicDescription == 'Public Administration and Defence' ? "selected" : "" }}>Public Administration and Defence</option>
                            <option value="Education" {{ $company->sicDescription == 'Education' ? "selected" : "" }}>Education</option>
                            <option value="Health &amp; Social Work" {{ $company->sicDescription == 'Health &amp; Social Work' ? "selected" : "" }}>Health &amp; Social Work</option>
                            <option value="Other Social and Personal Services" {{ $company->sicDescription == 'Other Social and Personal Services' ? "selected" : "" }}>Other Social and Personal Services</option>
                            <option value="Private Households with Employees" {{ $company->sicDescription == 'Private Households with Employees' ? "selected" : "" }}>Private Households with Employees</option>
                            <option value="Extra Territorial Organisations" {{ $company->sicDescription == 'Extra Territorial Organisations' ? "selected" : "" }}>Extra Territorial Organisations</option>
                        </select>

                    @else
                        <select name="sicDescription" class="form-control" id="sicDescription_e">
                            <option value="Agriculture, Hunting &amp; Forestry">Agriculture, Hunting &amp; Forestry</option>
                            <option value="Fishing">Fishing</option>
                            <option value="Mining &amp; Quarrying">Mining &amp; Quarrying</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Electricity, Gas &amp; Water Supply">Electricity, Gas &amp; Water Supply</option>
                            <option value="Construction">Construction</option>
                            <option value="Wholesale &amp; Retail">Wholesale &amp; Retail</option>
                            <option value="Hotel &amp; Restaurants &amp; Bars">Hotel &amp; Restaurants &amp; Bars</option>
                            <option value="Transport, Storage and Communication">Transport, Storage and Communication</option>
                            <option value="Financial Intermediation">Financial Intermediation</option>
                            <option value="Real Estate, Renting and Business">Real Estate, Renting and Business</option>
                            <option value="Public Administration and Defence">Public Administration and Defence</option>
                            <option value="Education">Education</option>
                            <option value="Health &amp; Social Work">Health &amp; Social Work</option>
                            <option value="Other Social and Personal Services">Other Social and Personal Services</option>
                            <option value="Private Households with Employees">Private Households with Employees</option>
                            <option value="Extra Territorial Organisations">Extra Territorial Organisations</option>
                        </select>
                    @endif


                </div>
            </div>

            <div class="form-group">
                <label for="jobTitle_e" class="col-sm-3 control-label">Job Title</label>
                <div class="col-sm-9">
                    <input type="text" name="jobTitle" class="form-control" placeholder="Job Title" value="{{ $company->jobTitle or '' }}" id="jobTitle_e" />
                </div>
            </div>

            <div id="general">
                @include('site.company.generral')
            </div>

            <div id="sole_trader">
                @include('site.company.sole_trader')
            </div>

            <div id="partnership">
                @include('site.company.partnership')
            </div>

        </div>
        <div class="box-footer clearfix">
            <button type="button" id="tab_h2" class="pull-left btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>
            <button type="button" id="tab_j1" class="pull-right btn btn-success">Next <i class="fa fa-chevron-right"></i></button>
        </div>
    </form>
</div>