@extends('layouts.master')
@extends('box.add_note')

@section('title')
    My Submissions
@endsection

@section('page')
    My Submissions
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <table id="dataTable"  data-src="{{action('Mysite\SubmissionController@data_table')}}" class="table table-striped table-hover table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th>Main Action</th>
                        <th>Last Update</th>
                        <th>Product Type</th>
                        <th>Unique ID</th>
                        <th>Site Name</th>
                        <th>Post Code</th>
                        <th>MPAN</th>
                        <th>MPRN</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody style="text-transform: uppercase;">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        $(function () {
            $('#dataTable').DataTable({
                "iDisplayLength": 100,
                "order": [[ 1, "desc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": [0, 6, 7, 8, 10] }//For Column Order
                ],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": $('#dataTable').data('src'),
                    "type": "GET",
                    "dataSrc": "data"
                },
                "columns": [
                    { "data": "m_action" },
                    { "data": "updated_at" },
                    { "data": "productType" },
                    { "data": "siteID" },
                    { "data": "companyName" },
                    { "data": "postCode" },
                    { "data": "mpan" },
                    { "data": "mprn" },
                    { "data": "user" },
                    { "data": "status" },
                    { "data": "action" }
                ],
                "drawCallback": function( settings ) {

                    $('.noteAdd').click(function () {
                        var siteID = $(this).data('id');
                        $('#addNoteFrom .siteID').val(siteID);

                        show_note(siteID);
                    });


                    $('.changeStatuses').click(function () {
                        var siteID = $(this).data('id');
                        var status = $(this).data('status');
                        var user = $(this).data('user');

                        $('.siteID').val(siteID);
                        $('#status').val(status);
                        $('#userID').val(user);

                    });


                }
            });
        });

        $(function () {


            $('#addNoteFrom').on('submit', function (e) {
                e.preventDefault();

                var sub_url = $(this).attr('action');
                var methods = $(this).attr('method');
                var siteID = $('#addNoteFrom .siteID').val();

                $.ajax({
                    url: sub_url,
                    type: methods,
                    dataType: 'json',
                    data:$(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            $('#addNoteFrom')[0].reset();
                            show_note(siteID);
                        }else{
                            alert('Update Nothing!! Please Try Again.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Update Nothing!! Please Try Again.');
                    }
                });

            });


        });


        function show_note(siteID) {
            var table_value = '';
            $.ajax({
                url: "{{url('site_details/show_notes')}}/"+siteID,
                type: 'get',
                dataType: 'json',
                beforeSend: function(){
                    $('#show_all_note').html('<p class="text-center text-muted"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i></p>');
                },
                success:function(result){
                    var b = result.all;
                    if(result.success == 1 && b.length > 0){
                        $.each(result.all, function( i, value ){
                            table_value += '<div class="direct-chat-msg">'
                                    +'<div class="direct-chat-info clearfix">'
                                    +'<span class="direct-chat-name pull-left">'+result.all[i].user+'</span>'
                                    +'<span class="direct-chat-timestamp pull-right">'+result.all[i].created+'</span>'
                                    +'</div>'
                                    +'<div class="direct-chat-text">'+result.all[i].description+'</div>'
                                    +'</div>';
                        });

                        $('#show_all_note').html(table_value);
                    }else{
                        $('#show_all_note').html('<p class="text-center text-muted">No note found.</p>');
                    }
                },
                error: function (jXHR, textStatus, errorThrown) {html("")}
            });

        }


    </script>
@endsection
