@section('box')
    <div id="addNote" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add Note</h4>
                </div>
                <form id="addNoteFrom" action="{{action('SiteDetailsController@add_note')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <input type="hidden" class="siteID" name="siteID">

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xs-12" id="show_all_note" style="max-height: 250px; overflow-x: hidden; overflow-y: auto;">
                                <!-- All Note-->

                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="addNotes" class="control-label">Add Note</label>

                            <textarea name="description" class="form-control" placeholder="Add some note ... .."></textarea>

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

    <div id="changeStatus" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Change Customer Status</h4>
                </div>
                <form action="{{action('SiteDetailsController@change_status')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <input type="hidden" class="siteID" name="siteID">

                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">Change Status</span>
                            <select name="status" id="status" class="form-control" >
                                <option value="Active">Active</option>
                                <option value="Under Processing">Under Processing</option>
                                <option value="Live">Live</option>
                                <option value="Out of Contact">Out of Contact</option>
                            </select>
                        </div>
                        @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                            <br>
                        <div class="input-group">
                            <span class="input-group-addon">Forward To User</span>
                            <select name="userID" id="userID" class="form-control" >
                                @foreach($table as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

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