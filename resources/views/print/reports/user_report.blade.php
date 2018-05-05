@extends('layouts.print')

@section('title')
    User Submission Reports
@endsection
@section('header')
    User Submission Reports
@endsection

@section('name')
    <strong>User name: </strong>{{$user_name}}
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
                        <th>Date</th>
                        <th>Electricity</th>
                        <th>Gas</th>
                        <th>Water</th>
                        <th>Land Line</th>
                        <th>Broad Band</th>
                        <th>Insurance</th>
                        <th>E-Pos</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                        $electricity = 0;
                        $gas = 0;
                        $water = 0;
                        $lend_line = 0;
                        $broad_band = 0;
                        $insurance = 0;
                        $e_pos = 0;
                    @endphp


                    @foreach($table as $row)
                        <tr>
                            <td>{{pub_date($row->date)}}</td>
                            <td>{{$row->electricity}}</td>
                            <td>{{$row->gas}}</td>
                            <td>{{$row->water}}</td>
                            <td>{{$row->lend_line}}</td>
                            <td>{{$row->broad_band}}</td>
                            <td>{{$row->insurance}}</td>
                            <td>{{$row->e_pos}}</td>
                        </tr>
                        @php
                            $electricity += $row->electricity;
                            $gas += $row->gas;
                            $water += $row->water;
                            $lend_line += $row->lend_line;
                            $broad_band += $row->broad_band;
                            $insurance += $row->insurance;
                            $e_pos += $row->e_pos;
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total:</th>
                            <th>{{$electricity}}</th>
                            <th>{{$gas}}</th>
                            <th>{{$water}}</th>
                            <th>{{$lend_line}}</th>
                            <th>{{$broad_band}}</th>
                            <th>{{$insurance}}</th>
                            <th>{{$e_pos}}</th>
                        </tr>
                    </tfoot>
                </table>

        </div>
    </div>

@endsection