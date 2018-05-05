@php

    if(isset($site->siteID)){
        $payment = $site->payment()->first();
    }

@endphp
<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-money"></i>
        <h3 class="box-title">Payment Details</h3>
    </div>
    <form id="paymentFrom" action="{{action('PaymentController@save')}}" class="form-horizontal" data-url="{{action('Mysite\SiteController@index')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <input type="hidden" class="siteID" name="siteID" value="{{ $site->siteID or '' }}">
        <input type="hidden" class="paymentID" name="paymentID" value="{{ $payment->paymentID or '' }}">


        <div class="box-body">

            <div class="form-group">
                <label for="paymentMethod_g" class="col-sm-3 control-label">Payment Method</label>
                <div class="col-sm-9">
                    @if(isset($payment->paymentMethod))
                        <select name="paymentMethod" class="form-control" id="paymentMethod_g">
                            <option value="Existing Payment" {{ $payment->paymentMethod == 'Existing Payment' ? "selected" : "" }}>Use Existing Payment</option>
                            <option value="Cash/Cheque" {{ $payment->paymentMethod == 'Cash/Cheque' ? "selected" : "" }}>Cash/Cheque</option>
                            <option value="Variable Direct Debit" {{ $payment->paymentMethod == 'Variable Direct Debit' ? "selected" : "" }}>Variable Direct Debit</option>
                            <option value="Fixed Direct Debit" {{ $payment->paymentMethod == 'Fixed Direct Debit' ? "selected" : "" }}>Fixed Direct Debit</option>
                        </select>
                    @else
                        <select name="paymentMethod" class="form-control" id="paymentMethod_g">
                            <option value="Existing Payment">Use Existing Payment</option>
                            <option value="Cash/Cheque">Cash/Cheque</option>
                            <option value="Variable Direct Debit">Variable Direct Debit</option>
                            <option value="Fixed Direct Debit">Fixed Direct Debit</option>
                        </select>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="billingFrequency_g" class="col-sm-3 control-label">Billing Frequency</label>
                <div class="col-sm-9">
                    @if(isset($payment->billingFrequency))
                        <select name="billingFrequency" class="form-control" id="billingFrequency_g">
                            <option value="Quarterly Billing" {{ $payment->billingFrequency == 'Quarterly Billing' ? "selected" : "" }}>Quarterly Billing</option>
                            <option value="Monthly Billing" {{ $payment->billingFrequency == 'Monthly Billing' ? "selected" : "" }}>Monthly Billing</option>
                        </select>
                    @else
                        <select name="billingFrequency" class="form-control" id="billingFrequency_g">
                            <option value="Quarterly Billing">Quarterly Billing</option>
                            <option value="Monthly Billing">Monthly Billing</option>
                        </select>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="bankName_g" class="col-sm-3 control-label">Bank Name</label>
                <div class="col-sm-9">
                    <input type="text" name="bankName" class="form-control" placeholder="Bank Name" value="{{ $payment->bankName or '' }}" id="bankName_g" />
                </div>
            </div>

            <div class="form-group">
                <label for="shortCode_g" class="col-sm-3 control-label">Short Code</label>
                <div class="col-sm-9">
                    <input type="text" name="shortCode" class="form-control" placeholder="Short Code" value="{{ $payment->shortCode or '' }}" id="shortCode_g" />
                </div>
            </div>

            <div class="form-group">
                <label for="accountName_g" class="col-sm-3 control-label">Account Name</label>
                <div class="col-sm-9">
                    <input type="text" name="accountName" class="form-control" placeholder="Account Name" value="{{ $payment->accountName or '' }}" id="accountName_g" />
                </div>
            </div>

            <div class="form-group">
                <label for="accountNumber_g" class="col-sm-3 control-label">Account Number</label>
                <div class="col-sm-9">
                    <input type="text" name="accountNumber" class="form-control" placeholder="Account Number" value="{{ $payment->accountNumber or '' }}" id="accountNumber_g" />
                </div>
            </div>

        </div>
        <div class="box-footer clearfix">
            <button type="button" id="tab_j2" class="pull-left btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>
            <button type="submit" class="pull-right btn btn-success"><i class="fa fa-paper-plane"></i> Submit</button>
        </div>
    </form>
</div>