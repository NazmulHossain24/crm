@extends('layouts.master')
@extends('box.entry')

@section('title')
    Company Entry
@endsection

@section('page')
    Company Entry
@endsection

@section('content')
    <div class="row margin-bottom">
        <div class="col-md-6">
            <button class="btn btn-social btn-primary btn-flat" data-toggle="modal" data-target="#entryCompany">
                <i class="fa fa-plus"></i>
                Add New Company Entry
            </button>
        </div>

        <div class="col-md-6">
            <button class="btn btn-social btn-primary btn-flat" data-toggle="modal" data-target="#entryProcess">
                <i class="fa fa-plus"></i>
                Add New Process With
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <table id="dataTable" class="table table-striped table-hover table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Company Name</th>
                        <th class="text-center">Edit</th>
                        <th class="text-right">Del</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>{{$row->companyID}}</td>
                            <td>{{$row->name}}</td>
                            <td class="text-center"><button data-id="{{$row->companyID}}" data-name="{{$row->name}}" class="btn btn-xs btn-flat btn-success ediModal"  data-toggle="modal" data-target="#ediEntryCompany">Edit</button></td>
                            <td class="text-right"><a href="{{url('entry/del', [$row->companyID])}}" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-6">
            <div class="box box-info">
                <table id="dataTable2" class="table table-striped table-hover table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Company Name</th>
                        <th class="text-center">Edit</th>
                        <th class="text-right">Del</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($process as $row)
                        <tr>
                            <td>{{$row->companyID}}</td>
                            <td>{{$row->name}}</td>
                            <td class="text-center"><button data-id="{{$row->companyID}}" data-name="{{$row->name}}" class="btn btn-xs btn-flat btn-success ediModalProcess"  data-toggle="modal" data-target="#ediEntryProcess">Edit</button></td>
                            <td class="text-right"><a href="{{url('entry/del', [$row->companyID])}}" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a></td>
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
                "order": [[ 0, "desc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": [2,3] }//For Column Order
                ]
            });


            $('#dataTable2').DataTable({
                "order": [[ 0, "desc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": [2,3] }//For Column Order
                ]
            });
        });

        $(function () {
            $('.ediModal').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');

                $('#companyID').val(id);
                $('#companyName').val(name);
            });


            $('.ediModalProcess').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');

                $('#companyIDProcess').val(id);
                $('#companyNameProcess').val(name);
            });
        });

    </script>

@endsection