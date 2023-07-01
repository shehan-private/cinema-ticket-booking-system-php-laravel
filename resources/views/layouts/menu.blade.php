<!-- Admin dashboard menu -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
    {{-- @can('movies') --}}
    <li class="nav-item menu-is-opening menu-open">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bed"></i><p>Movies<i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
                <a href="{{route('movie.index')}}" class="nav-link {{ Request::is('movie.index') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>All Movies</p></a>
            </li>
            <li class="nav-item">
                <a href="{{route('movie.create')}}" class="nav-link {{ Request::is('movie.create') ? 'active' : '' }}"><i class="fas fa-folder-plus nav-icon"></i><p>Add Movie</p></a>
            </li>
        </ul>
    </li>
    {{-- @endcan --}}

    {{-- Session menu --}}

    <li class="nav-item menu-is-opening menu-open">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bed"></i><p>Sessions<i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
                <a href="{{route('session.index')}}" class="nav-link {{ Request::is('session.index') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>All Sessions</p></a>
            </li>
            <li class="nav-item">
                <a href="{{route('session.create')}}" class="nav-link {{ Request::is('session.create') ? 'active' : '' }}"><i class="fas fa-folder-plus nav-icon"></i><p>Add Session</p></a>
            </li>
        </ul>
    </li>

    {{-- Class menu --}}

    <li class="nav-item menu-is-opening menu-open">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bed"></i><p>Classes<i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
                <a href="{{route('class.index')}}" class="nav-link {{ Request::is('class.index') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>All Classes</p></a>
            </li>
            <li class="nav-item">
                <a href="{{route('class.create')}}" class="nav-link {{ Request::is('class.create') ? 'active' : '' }}"><i class="fas fa-folder-plus nav-icon"></i><p>Add Class</p></a>
            </li>
        </ul>
    </li>

</li>
{{-- <i class="fa-solid fa-clapperboard"></i> --}}
{{-- <i class="fa-solid fa-film"></i> --}}