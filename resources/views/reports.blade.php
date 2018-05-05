@extends('layouts.master')
@extends('box.user.user')

@section('title')
    All Reports
@endsection

@section('page')
    All Reports
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('shared.reports.notice_date')
        </div>

        <div class="col-md-6">
        @if(Auth::user()->roles == 'Admin')
            @include('shared.reports.user_reports')
        @endif
            @include('shared.reports.my_reports')
        </div>
    </div>


@endsection






@section('style')

    <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/iCheck/all.css')}}">
@endsection


@section('script')
    <script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('public/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('public/plugins/iCheck/icheck.min.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

            $('[type="reset"]').click(function () {
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck('uncheck');
            });


        });

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

        $(function () {
            $(".select_two").select2();
        });
    </script>

@endsection

