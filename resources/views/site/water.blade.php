<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-tint"></i>
        <h3 class="box-title">Water Supply</h3>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-md-4 text-center"><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#waterMeter1">Water Meter No. 1</button></div>
            <div class="col-md-4 text-center"><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#waterMeter2">Water Meter No. 2</button></div>
            <div class="col-md-4 text-center"><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#waterMeter3">Water Meter No. 3</button></div>
        </div>

        @include('box.water')



    </div>
    <div class="box-footer clearfix">
        <button type="button" id="tab_c2" class="pull-left btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>
        <button type="button" id="tab_e1" class="pull-right btn btn-success">Next <i class="fa fa-chevron-right"></i></button>
    </div>
</div>