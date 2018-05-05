@section('box')

    <div id="rolesModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Change User Roles</h4>
                </div>
                <form action="{{action('UserController@changes')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {!! csrf_field() !!}
                    <input type="hidden" id="userID" name="id">
                    <div class="modal-body">
                        <p class="lead text-success" id="user"></p>
                        <hr>

                        <div class="input-group">
                            <span class="input-group-addon">User Roles</span>
                            <select class="form-control" id="roles" name="roles">
                                <option value="Super">Super Admin</option>
                                <option value="Admin">Admin</option>
                                <option value="Employee">Employee</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    <div id="entryUser" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Create New User</h4>
                </div>
                <form action="{{action('UserController@save')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">User Name</span>
                            <input class="form-control" name="name" type="text" placeholder="User Name" required/>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">User Email</span>
                            <input class="form-control" name="email" type="email"  placeholder="User Email" required/>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Contact</span>
                            <input class="form-control" name="contact" type="text"  placeholder="Contact Number"/>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">NID Number</span>
                            <input class="form-control" name="nid" type="text"  placeholder="NID Number"/>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Address</span>
                            <input class="form-control" name="address" type="text"  placeholder="User Address"/>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">DOB</span>
                            <input class="form-control" name="dob" type="text"  placeholder="Birth Day"    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">View AS</span>
                            <input class="form-control" name="viewAs" type="text"  placeholder="View as ex: Admin, Super Admin But Not"/>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">User Password</span>
                            <input class="form-control" name="password" type="text"  placeholder="User Password must be At least 6 character" required/>
                        </div>
                        <p>** User Password Must Be Enter</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    <div id="passwordModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Change User Info</h4>
                </div>
                <form action="{{action('UserController@edite_user')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {!! csrf_field() !!}
                    <input type="hidden" id="ediUserID" name="id">
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-addon">User Name</span>
                                <input class="form-control" name="name" id="ediName" type="text" placeholder="User Name" required/>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">User Email</span>
                                <input class="form-control" name="email" type="email"  id="ediEmail"  placeholder="User Email" required/>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Contact</span>
                                <input class="form-control" name="contact" id="ediContact" type="text"  placeholder="Contact Number"/>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">NID Number</span>
                                <input class="form-control" name="nid" id="ediNid" type="text"  placeholder="NID Number"/>
                            </div><br>



                            <div class="input-group">
                                <span class="input-group-addon">Address</span>
                                <input class="form-control" name="address" id="ediAddress" type="text"  placeholder="User Address"/>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">DOB</span>
                                <input class="form-control" name="dob" type="text" id="ediDob"  placeholder="Birth Day"    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">View AS</span>
                                <input class="form-control" name="viewAs" type="text" id="ediViewAs"  placeholder="View as ex: Admin, Super Admin But Not"/>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">User Password</span>
                                <input class="form-control" name="password" type="text"  placeholder="User Password must be At least 6 character" required/>
                            </div>
                            <p>** User Password Must Be Enter</p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection