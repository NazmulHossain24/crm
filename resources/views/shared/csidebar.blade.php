<ol class="breadcrumb">
    <li><a href="{{url('attachments')}}">Attachment</a></li>
    @if(Auth::user()->roles == 'Admin')
        <li><a href="{{url('note')}}">Notes</a></li>
        @if(Auth::user()->su == 1)
        <li><a href="{{url('user')}}">Users</a></li>
        @endif
    @endif
    <li><a href="{{url('reports')}}">Reports</a></li>
</ol>