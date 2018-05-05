@extends('layouts.print')

@section('title')
    Warning Reports
@endsection
@section('header')
    Warning Reports
@endsection

@section('dates')
    <strong>Date: </strong>{{$date_range}}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

                <table id="dataTable" class="table table-striped table-hover table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th>Unique ID</th>
                        <th>Type</th>
                        <th>Notice Date</th>
                        <th>Description</th>
                        <th>User</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($table as $row)
                        <tr>
                            <td>{{$row->siteID}}</td>
                            <td>{{$row->meterType}}</td>
                            <td>{{$row->noticeDate}}</td>
                            <td>{{$row->description}}</td>
                            <td>{{$row->site->user['name']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

        </div>
    </div>

@endsection