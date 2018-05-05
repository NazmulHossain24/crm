@extends('layouts.master')
@extends('box.attachment')

@section('title')
    Attachment
@endsection

@section('page')
    Attachment
@endsection

@section('content')

    <div class="row margin-bottom">
        <div class="col-md-12">
            <button class="btn btn-social btn-primary btn-flat" data-toggle="modal" data-target="#newAttachment">
                <i class="fa fa-plus"></i>
                Add New Attachment
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <table id="dataTable" class="table table-striped table-hover table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Date</th>
                        <th>Attachment Title</th>
                        <th>Attachment Description</th>
                        <th class="text-center">Edit</th>
                        <th class="text-right">Del</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>{{$row->attachmentID}}</td>
                            <td>{{$row->created_at}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->descriptions}}</td>
                            <td class="text-center"><a href="{{asset('public/attachment/'.$row->attachmentID.'.'.$row->file_type)}}" class="btn btn-xs btn-flat btn-success">View</a></td>
                            <td class="text-right"><a href="{{url('attachments/del', [$row->attachmentID, $row->file_type])}}" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a></td>
                        </tr>
                    @endforeach
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
                "order": [[ 2, "desc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": [4,5] }//For Column Order
                ]
            });
        });
    </script>
@endsection