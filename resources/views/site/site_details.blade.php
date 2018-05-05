<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-info-circle"></i>
        <h3 class="box-title">Site Details</h3>
    </div>
    <form action="{{action('SiteDetailsController@save')}}" id="siteDetailsForm" class="form-horizontal" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">

        <div class="box-body">
            
            <div class="form-group">
                <label for="postCode_a" class="col-sm-3 control-label">Post Code</label>
                <div class="col-sm-9">
                    <input class="form-control" name="postCode" id="postCode_a" data-suburl="{{action('SiteDetailsController@check_post_code')}}"  placeholder="Post Code" value="{{ $site->postCode or '' }}" type="text">
                </div>
            </div>
            
            @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
            <div class="form-group">
                <label for="processWith_a" class="col-sm-3 control-label">Process With</label>
                <div class="col-sm-9">
                    <select name="processWith" class="form-control" id="processWith_a">
                        <option value="">Process With...</option>
                        @foreach($process as $row)
                            @if(isset($site->processWith))
                                <option value="{{$row->name}}" {{ $site->processWith == $row->name ? 'selected' : '' }}>{{$row->name}}</option>
                            @else
                                <option value="{{$row->name}}">{{$row->name}}</option>
                            @endif
                        @endforeach
                    </select>

                </div>


            </div>
            @endif
            <div class="form-group">
                <label for="productType_a" class="col-sm-3 control-label">Product Type</label>
                <div class="col-sm-9">

                    @if(isset($site->productType))
                        <select name="productType" class="form-control" id="productType_a">
                            <option value="New Customer" {{ $site->productType == 'New Customer' ? "selected" : "" }}>New Customer</option>
                            <option value="Renewal" {{ $site->productType == 'Renewal' ? "selected" : "" }}>Renewal</option>
                        </select>
                    @else
                        <select name="productType" class="form-control" id="productType_a">
                            <option value="New Customer">New Customer</option>
                            <option value="Renewal">Renewal</option>
                        </select>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="contactName_a" class="col-sm-3 control-label">Contact Name</label>
                @php
                    if(isset($site->contactName)){
                        $contactName = explode(". ",$site->contactName);
                    }
                @endphp

                <div class="col-sm-2">
                    @if(isset($site->contactName))
                        <select name="name_title" class="form-control">
                            <option value="MR" {{ $contactName[0] == 'MR' ? "selected" : "" }}>MR</option>
                            <option value="MRS" {{ $contactName[0] == 'MRS' ? "selected" : "" }}>MRS</option>
                            <option value="MISS" {{ $contactName[0] == 'MISS' ? "selected" : "" }}>MISS</option>
                            <option value="MS" {{ $contactName[0] == 'MS' ? "selected" : "" }}>MS</option>
                            <option value="DR" {{ $contactName[0] == 'DR' ? "selected" : "" }}>DR</option>
                            <option value="PROF" {{ $contactName[0] == 'PROF' ? "selected" : "" }}>PROF</option>
                            <option value="REV" {{ $contactName[0] == 'REV' ? "selected" : "" }}>REV</option>
                        </select>
                        @else
                        <select name="name_title" class="form-control">
                            <option value="MR">MR</option>
                            <option value="MRS">MRS</option>
                            <option value="MISS">MISS</option>
                            <option value="MS">MS</option>
                            <option value="DR">DR</option>
                            <option value="PROF">PROF</option>
                            <option value="REV">REV</option>
                        </select>
                        @endif

                </div>
                <div class="col-sm-7">
                    <input name="contactName" class="form-control" id="contactName_a" placeholder="Contact Name" value="{{ $contactName[1] or '' }}" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="companyName_a" class="col-sm-3 control-label">Company Name</label>
                <div class="col-sm-9">
                    <input class="form-control" name="companyName" id="companyName_a" placeholder="Company Name" value="{{ $site->companyName or '' }}" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="occupancyType_a" class="col-sm-3 control-label">Occupancy Type</label>
                <div class="col-sm-9">
                    @if(isset($site->occupancyType))
                        <select name="occupancyType" class="form-control" id="occupancyType_a">
                            <option value="OWNER" {{ $site->occupancyType == 'OWNER' ? "selected" : "" }}>OWNER</option>
                            <option value="LANDLORD" {{ $site->occupancyType == 'LANDLORD' ? "selected" : "" }}>LANDLORD</option>
                            <option value="TENANT" {{ $site->occupancyType == 'TENANT' ? "selected" : "" }}>TENANT</option>
                        </select>
                    @else
                        <select name="occupancyType" class="form-control" id="occupancyType_a">
                            <option value="OWNER">OWNER</option>
                            <option value="LANDLORD">LANDLORD</option>
                            <option value="TENANT">TENANT</option>
                        </select>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="buildingName_a" class="col-sm-3 control-label">Building Number/Name</label>
                <div class="col-sm-9">
                    <input class="form-control" name="buildingName" id="buildingName_a" placeholder="Building Number/Name" value="{{ $site->buildingName or '' }}" type="text">
                </div>
            </div>


            <div class="form-group">
                <label for="street_a" class="col-sm-3 control-label">Number and Street</label>
                <div class="col-sm-9">
                    <input class="form-control" name="street" id="street_a" placeholder="Number and Street" value="{{ $site->street or '' }}" type="text">
                </div>
            </div>


            <div class="form-group">
                <label for="city_a" class="col-sm-3 control-label">Town/City</label>
                <div class="col-sm-9">
                    <input class="form-control" name="city" id="city_a" placeholder="Town/City" value="{{ $site->city or '' }}" type="text">
                </div>
            </div>


            <div class="form-group">
                <label for="country_a" class="col-sm-3 control-label">Country</label>
                <div class="col-sm-9">
                    <input class="form-control" name="country" id="country_a" placeholder="Country" value="{{ $site->country or '' }}" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="landLine_a" class="col-sm-3 control-label">Land Line</label>
                <div class="col-sm-9">
                    <input class="form-control" name="landLine" id="landLine_a" placeholder="Land Line" value="{{ $site->landLine or '' }}" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="mobileNumber_a" class="col-sm-3 control-label">Mobile Number</label>
                <div class="col-sm-9">
                    <input class="form-control" name="mobileNumber" id="mobileNumber_a" placeholder="Mobile Number" value="{{ $site->mobileNumber or '' }}" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="email_a" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input class="form-control" name="email" id="email_a" placeholder="Email" value="{{ $site->email or '' }}" type="email">
                </div>
            </div>

            <div class="form-group">
                <label for="happy_a" class="col-sm-3 control-label">Happy to be contacted</label>
                <div class="col-sm-9">

                    @if(isset($site->happy))
                        <select name="happy" class="form-control" id="happy_a">
                            <option value="Yes" {{ $site->happy == 'Yes' ? "selected" : "" }}>Yes</option>
                            <option value="No" {{ $site->happy == 'No' ? "selected" : "" }}>No</option>
                        </select>
                    @else
                        <select name="happy" class="form-control" id="happy_a">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    @endif

                </div>
            </div>


            @if(isset($site->contactMethod))

                @php
                    $contactMethod = unserialize($site->contactMethod);
                @endphp

                <div class="form-group">
                    <label class="col-sm-3 control-label">Preferred Contact Method</label>
                    <div class="col-sm-1">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Post" type="checkbox" {{ in_array("Post", $contactMethod) ? "checked" : "" }}> Post
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Phone" type="checkbox" {{ in_array("Phone", $contactMethod) ? "checked" : "" }}> Phone
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Mobile(SMS)" type="checkbox" {{ in_array("Mobile(SMS)", $contactMethod) ? "checked" : "" }}> Mobile(SMS)
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Email" type="checkbox" {{ in_array("Email", $contactMethod) ? "checked" : "" }}> Email
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Face to Face" type="checkbox" {{ in_array("Face to Face", $contactMethod) ? "checked" : "" }}> Face to Face
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Third Parties" type="checkbox" {{ in_array("Third Parties", $contactMethod) ? "checked" : "" }}> Third Parties
                            </label>
                        </div>
                    </div>

                </div>

                @else


                <div class="form-group">
                    <label class="col-sm-3 control-label">Preferred Contact Method</label>
                    <div class="col-sm-1">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Post" type="checkbox"> Post
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Phone" type="checkbox"> Phone
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Mobile(SMS)" type="checkbox"> Mobile(SMS)
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Email" type="checkbox"> Email
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Face to Face" type="checkbox"> Face to Face
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label>
                                <input name="contactMethod[]" value="Third Parties" type="checkbox"> Third Parties
                            </label>
                        </div>
                    </div>

                </div>

                @endif

            @include('box.check_post_code')

        </div>
        <div class="box-footer clearfix">
            <button type="button" id="tab_b1" class="pull-right btn btn-success">Next <i class="fa fa-chevron-right"></i></button>
        </div>
    </form>
</div>
