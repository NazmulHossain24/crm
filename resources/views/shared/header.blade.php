<!-- Main Header -->
<header class="main-header">

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top navbar-fixed-top" role="navigation">
        <!-- Sidebar toggle button-->
        @if(Request::is('new/*'))
        <a href="#" class="sidebar-toggle {{ (Request::is('new/*') ? 'hidden-lg hidden-md' : '') }}" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        @endif
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ url('/') }}" class="navbar-brand"><b>Admin</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav nav-design">
                    <li class="{{ (Request::is('new/*') ? 'active' : '') }}"><a href="{{ url('new/site') }}">New Site</a></li>
                    <li class="{{ (Request::is('my/site') ? 'active' : '') }}"><a href="{{ url('my/site') }}">My Site</a></li>
                    <li class="{{ (Request::is('my/submissions') ? 'active' : '') }}"><a href="{{ url('my/submissions') }}">My Submissions</a></li>
                   @if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1)
                    <li class="{{ (Request::is('entry') ? 'active' : '') }}"><a href="{{ url('entry') }}">Company Entry</a></li>
                    @endif
                </ul>
                <form id="search_form" action="{{action('DashboardController@search')}}" data-action="{{action('DashboardController@search_api')}}" class="navbar-form navbar-left" method="get" autocomplete="off" role="search">
                    <div class="input-group">
                        <select  id="search" style="width: 100%;" name="search" class="form-control"></select>
                        <span class="input-group-btn">
                            <button class="btn btn-flat btn-default" style="height: 33px;" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </form>
            </div><!-- /.navbar-collapse -->



            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li><a href="{{Request::url()}}" ><i class="fa fa-user"></i> {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Log out </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
</header>
<div style="height: 50px;"></div>