<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master Data</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('home')}}"><i class="glyphicon glyphicon-credit-card"></i> Dashboard</a></li>
            @if (Auth::user()->level == 'admin')
                <li><a href="{{route('user.index')}}"><i class="glyphicon glyphicon-user"></i> Data User</a></li>
            @endif
            <li><a href="{{route('pelaku.index')}}"><i class="glyphicon glyphicon-book"></i> Data Tersangka</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="glyphicon glyphicon-off"></i>
            <p>Keluar</p>
        </a>
        <form action="{{route('logout')}}" id="logout-form" method="post" style="display: none;">
            @csrf
        </form>
    </li>

</ul>
