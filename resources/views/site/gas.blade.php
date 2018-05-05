<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-fire"></i>
        <h3 class="box-title">Gas Supply</h3>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-md-4 text-center"><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#gasMeter1">Gas Meter No. 1</button></div>
            <div class="col-md-4 text-center"><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#gasMeter2">Gas Meter No. 2</button></div>
            <div class="col-md-4 text-center"><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#gasMeter3">Gas Meter No. 3</button></div>
        </div>

        @include('box.gas')

    </div>
    <div class="box-footer clearfix">
        <button type="button" id="tab_b2" class="pull-left btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>
        <button type="button" id="tab_d1" class="pull-right btn btn-success">Next <i class="fa fa-chevron-right"></i></button>
    </div>
</div>