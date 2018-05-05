@section('box')

    <div id="newAttachment" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add New Attachment</h4>
                </div>
                <form action="{{action('AttachmentController@save')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">Attachment Title</span>
                            <input class="form-control" name="title" placeholder="Attachment Title" type="text" required>
                        </div>
                        <div class="form-group"  style="padding: 15px 15px;">
                            <label for="description">Attachment Description</label>
                            <textarea class="form-control" name="descriptions" rows="3" placeholder="Attachment Description ..."  id="description"></textarea>
                        </div>
                        <div class="form-group" style="padding: 0px 15px;">
                            <label for="file_name"><i class="fa fa-paperclip"></i> Attached File</label>
                            <input type="file" name="file_name" id="file_name" placeholder="Attached File">
                            <p class="help-block">File must be less than 2MB</p>
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