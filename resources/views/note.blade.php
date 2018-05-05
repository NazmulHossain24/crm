@extends('layouts.master')

@section('title')
    Note
@endsection

@section('page')
    Note
@endsection

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8 text-center">

            @if(session('message'))
            <div class="panel">{{session('message')}}</div>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <i class="fa fa-book"></i>
                    <h3 class="box-title">Send Note</h3>
                </div>

                <form action="{{action('NoteController@send')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box-body" style="padding: 15px 25px;">
                        <!--<div id="show_message">
                            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label for="note">Message</label>
                            <textarea class="form-control" name="message" rows="8" placeholder="Message ..."  id="note"></textarea>
                        </div>

                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-right btn btn-success">Send <i class="fa fa-send"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection