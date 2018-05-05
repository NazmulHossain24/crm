<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/bootstrap/bootstrap-print/css/bootstrap-print.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/bootstrap/bootstrap-print/css/bootstrap-print-xs.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/dist/css/AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/dist/css/skins/all-skins.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/print.css')}}">

@yield('style')

<!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->

</head>

<body class="hold-transition skin-green sidebar-mini" style="height: auto;">

<div class="container">
    <div class="row hidden-print">
        <div class="col-xs-6 text-left">
            <!--<button id="back" type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button>-->
            <a href="{{URL::previous()}}" class="btn btn-danger" style="margin-right: 10px;"><i class="fa fa-chevron-left"></i> Back</a>
        </div>
        <div class="col-xs-6 text-right">
            <button id="prints" type="button" class="btn btn-success"><i class="fa fa-print"></i> Print Now</button>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10">
            <h3 class="text-center"><ins>@yield('header')</ins></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-offset-1 col-xs-5">@yield('name')</div>
        <div class="col-xs-5 text-right">@yield('dates')</div>
    </div>

    <div class="row">
        <div class="col-xs-offset-1 col-xs-10"><hr /></div>
    </div>

    @yield('content')
</div>


<script src="{{asset('public/plugins/jQuery/jquery-3.2.1.min.js')}}"></script>

@yield('script')

<script src="{{asset('public/print.js')}}"></script>



</body>
</html>
