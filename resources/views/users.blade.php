@extends('layouts.master')
@extends('box.user.user')

@section('title')
    All User
@endsection

@section('page')
    All User
@endsection

@section('content')
    <div class="row margin-bottom">
        <div class="col-md-12">
            @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
            <button class="btn btn-social btn-primary btn-flat" data-toggle="modal" data-target="#entryUser">
                <i class="fa fa-plus"></i>
                Create New User
            </button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <table id="dataTable" class="table table-striped table-hover table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>NID Number</th>
                        <th>DOB</th>
                        @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <th class="text-center">Change Roles</th>
                        @endif
                        <th class="text-center">Change Info</th>
                        @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                        <th class="text-right">Del</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{($row->roles == 'Admin' && $row->su == 1 ? 'Super Admin':$row->viewAs)}}</td>
                            <td>{{$row->contact}}</td>
                            <td>{{$row->address}}</td>
                            <td>{{$row->nid}}</td>
                            <td>{{$row->dob}}</td>
                            @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                            <td class="text-center"><button data-id="{{$row->id}}" data-roles="{{($row->roles == 'Admin' && $row->su == 1 ? 'Super':$row->roles)}}" data-name="{{$row->name}} [{{$row->email}}]" class="btn btn-xs btn-flat btn-success ediModal"  data-toggle="modal" data-target="#rolesModal">Change roles</button></td>
                            @endif
                            <td class="text-center"><button data-id="{{$row->id}}" data-contact="{{$row->contact}}" data-dob="{{$row->dob}}" data-viewas="{{$row->viewAs}}" data-address="{{$row->address}}" data-nid="{{$row->nid}}" data-name="{{$row->name}}" data-email="{{$row->email}}" class="btn btn-xs btn-flat btn-success ediInfoModal"  data-toggle="modal" data-target="#passwordModal">Change Info</button></td>
                            @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                            <td class="text-right"><a href="{{url('user/del', [$row->id])}}" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script src="{{asset('public/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('public/plugins/jquery.inputmask.extensions.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            $('#dataTable').DataTable({
                "order": [[ 2, "desc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": [8,9, 10] }//For Column Order
                ]
            });
        });

        $(function () {
            $('.ediInfoModal').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var email = $(this).data('email');
                var address = $(this).data('address');
                var nid = $(this).data('nid');
                var contact = $(this).data('contact');
                var viewas = $(this).data('viewas');
                var dob = $(this).data('dob');

                $('#ediUserID').val(id);
                $('#ediName').val(name);
                $('#ediEmail').val(email);
                $('#ediNid').val(nid);
                $('#ediAddress').val(address);
                $('#ediContact').val(contact);
                $('#ediDob').val(dob);
                $('#ediViewAs').val(viewas);
            });
        });


        $(function () {
            $('.ediModal').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var roles = $(this).data('roles');

                $('#userID').val(id);
                $('#user').html(name);
                $('#roles').val(roles);
            });
        });

        $(function () {
            $("[data-mask]").inputmask();
        });
    </script>
@endsection