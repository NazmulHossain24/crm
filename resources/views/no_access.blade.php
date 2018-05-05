@extends('layouts.master')

@section('title')
    No Access
@endsection

@section('page')
    No Access
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">

                <h1 class="text-center text-danger">Oops! Something went wrong.</h1><hr>

                <h3 class="text-center text-blue">You are not authorize user.</h3><hr>

                <p class="text-center">Please Contact With Super Admin</p><br>
                <div class="text-center">

                    <a href="{{URL::previous()}}">Go Back</a>

                </div> <br>
            </div>
        </div>
    </div>
@endsection
