<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-bolt"></i>
        <h3 class="box-title">Electricity Supply</h3>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-md-4 text-center"><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#electiricMeter1">Electric Meter No. 1</button></div>
            <div class="col-md-4 text-center"><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#electiricMeter2">Electric Meter No. 2</button></div>
            <div class="col-md-4 text-center"><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#electiricMeter3">Electric Meter No. 3</button></div>
        </div>

        @include('box.electricity')

    </div>
    <div class="box-footer clearfix">
        <button type="button" id="tab_a2" class="pull-left btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>
        <button type="button" id="tab_c1" class="pull-right btn btn-success">Next <i class="fa fa-chevron-right"></i></button>
    </div>
</div>