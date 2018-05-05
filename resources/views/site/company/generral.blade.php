
    <div class="form-group">
        <label class="col-sm-3 control-label">Copy Address</label>
        <div class="col-sm-9">
            <button type="button" id="copyAddress_e" class="btn btn-flat btn-info"><i class="fa fa-copy"></i> Copy Address</button>
        </div>
    </div>

    <div class="form-group">
        <label for="address_e" class="col-sm-3 control-label">Years at Address</label>
        <div class="col-sm-9">
            <input type="text" name="address" class="form-control" placeholder="Years at Address" value="{{ $company->address or '' }}" id="address_e" />
        </div>
    </div>

    <div class="form-group">
        <label for="street_e" class="col-sm-3 control-label">Previous Street & Number</label>
        <div class="col-sm-9">
            <input type="text" name="street" class="form-control" placeholder="Previous Street & Number" value="{{ $company->street or '' }}" id="street_e" />
        </div>
    </div>

    <div class="form-group">
        <label for="town_e" class="col-sm-3 control-label">Previous Town</label>
        <div class="col-sm-9">
            <input type="text" name="town" class="form-control" placeholder="Previous Town" value="{{ $company->town or '' }}" id="town_e" />
        </div>
    </div>

    <div class="form-group">
        <label for="postCode_e" class="col-sm-3 control-label">Previous Post Code</label>
        <div class="col-sm-9">
            <input type="text" name="postCode" class="form-control" placeholder="Previous Post Code" value="{{ $company->postCode or '' }}" id="postCode_e" />
        </div>
    </div>
