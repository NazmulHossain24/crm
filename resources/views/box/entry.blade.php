@section('box')


    <div id="entryCompany" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add New Company Entry</h4>
                </div>
                <form action="{{action('CompanyEntryController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    {!! csrf_field() !!}
                    <input type="hidden" name="companyType" value="All">
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">Company Name</span>
                            <input class="form-control" id="company" name="name" placeholder="Company Name" type="text" required>
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


    <div id="ediEntryCompany" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit Company</h4>
                </div>
                <form action="{{action('CompanyEntryController@edit')}}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    {!! csrf_field() !!}

                    <input type="hidden" name="companyType" value="All">

                    <input type="hidden" id="companyID" name="companyID">



                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">Company Name</span>
                            <input class="form-control" id="companyName" name="name" placeholder="Company Name" type="text" required>
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




    <div id="entryProcess" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add New Process With</h4>
                </div>
                <form action="{{action('CompanyEntryController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    {!! csrf_field() !!}
                    <input type="hidden" name="companyType" value="Process">
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">Company Name</span>
                            <input class="form-control" id="company" name="name" placeholder="Company Name" type="text" required>
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


    <div id="ediEntryProcess" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit Process With</h4>
                </div>
                <form action="{{action('CompanyEntryController@edit')}}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    {!! csrf_field() !!}

                    <input type="hidden" name="companyType" value="Process">
                    <input type="hidden" id="companyIDProcess" name="companyID">

                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">Company Name</span>
                            <input class="form-control" id="companyNameProcess" name="name" placeholder="Company Name" type="text" required>
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

    @endsection