@extends('layouts.app')

@section('content')

<div class="container">
	<div id="login-box">
		<div class="logo">
			<h3 class="logo-caption">{{config('naz.company')}}</h3>
			<img src="{{asset('public/logo.png')}}" class="img img-responsive img-circle center-block"/>
			
			<h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
		</div><!-- /.logo -->
		<div class="controls">
		<form role="form" method="POST" action="{{ route('login') }}">
		{{ csrf_field() }}
			<input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif
			<button type="submit" class="btn btn-default btn-block btn-custom">Sign In</button>
			</form>
		</div><!-- /.controls -->
	</div><!-- /#login-box -->
</div><!-- /.container -->
<div id="particles-js"></div>

    <!-- Scripts -->
    <script src="{{asset('public/plugins/jQuery/jquery-3.2.1.min.js')}}"></script>

    <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/login.js')}}"></script>


    <script>

    </script>


@endsection
