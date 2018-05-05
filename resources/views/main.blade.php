@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('page')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 margin-bottom">
            <form id="filter_date" action="{{action('DashboardController@show')}}" method="get" enctype="multipart/form-data" autocomplete="off">
                <div class="input-group input-group-sm">
                    <input type="text" name="dateRange" class="form-control dateRange" placeholder="Pick Date Range For Showing Warning Reports..." required>
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="submit">Show Warning In Date Range</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">

                <table id="dataTable" data-src="{{action('DashboardController@show')}}" class="table table-striped table-hover table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th>View</th>
                        <th>Unique ID</th>
                        <th>Company</th>
                        <th>Type</th>
                        <th>Notice Date</th>
                        <th>Expire Date</th>
                        <th>User</th>
                        <th>Color</th>
                    </tr>
                    </thead>
                    <tbody style="text-transform: uppercase;">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection

@section('script')

    <script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('public/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

    <script type="text/javascript">

        $(function () {

            var urls = $('#dataTable').data('src');

            data_tables(urls);

           $('#filter_date').on('submit', function (e) {
                e.preventDefault();
               alert('Filtedr');
            });


        });

        function data_tables(urls) {
            $.fn.dataTable.moment( 'DD/MM/YYYY');


            //$.fn.dataTable.moment('DD/MM/YYYY HH:mm');

            $('#dataTable').DataTable({
                "iDisplayLength": 100,
                "order": [[ 1, "desc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": [0,2,5,6,7] }//For Column Order
                ],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": urls,
                    "type": "GET",
                    "dataSrc": "data"
                },
                "columns": [
                    { "data": "view" },
                    { "data": "siteID" },
                    { "data": "companyName" },
                    { "data": "type" },
                    { "data": "notice_date" },
                    { "data": "expire_date" },
                    { "data": "user" },
                    { "data": "colors" }
                ],

                "columnDefs": [{
                    "visible": false,
                    "targets": 7
                }],

                "createdRow": function( row, data, index ) {

                    switch (data['colors']) {
                        case 'Red':
                            $( 'td', row ).css( "background-color", "rgba(255, 0, 0, 0.8)" );
                            break;
                        case 'Yellow':
                            $( 'td', row ).css( "background-color", "rgba(255, 255, 0, 0.8)" );
                            break;
                        case 'Green':
                            $( 'td', row ).css( "background-color", "rgba(0, 128, 0, 0.8)" );
                            break;
                        default:
                            $( 'td', row ).css( "background-color", "rgba(255, 255, 255, 0.8)" );
                    }
                }

            });
        }


        $(function () {
            $('.dateRange').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYYY'
                }
            });


            $('.dateRange').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });

            $('.dateRange').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });


    </script>
@endsection