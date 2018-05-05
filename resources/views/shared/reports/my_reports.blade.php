<div class="box box-success collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user"></i> My Submission Reports</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <form action="{{action('ReportController@user_report')}}" method="post" enctype="multipart/form-data" autocomplete="off">
        {!! csrf_field() !!}
        <div class="box-body">
            <div class="box-body">

                <input type="hidden" name="userID" value="{{Auth::user()->id}}">

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input name="dateRange" type="text" class="form-control pull-right dateRange" placeholder="Pick Date Range" required>
                </div>
            </div>
        </div>
        <div class="box-footer clearfix">
            <button type="reset" class="pull-left btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
            <button type="submit" class="pull-right btn btn-success"><i class="fa fa-print"></i> Print</button>
        </div>
    </form>
</div>