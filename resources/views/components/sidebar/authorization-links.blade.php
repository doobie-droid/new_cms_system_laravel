<!-- Nav Item - Utilities Collapse Menu -->
@can('viewadmin',\App\Models\User::class)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuth" aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Authorisation</span>
        </a>
        <div id="collapseAuth" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('roles.index')}}">Roles</a>
                <a class="collapse-item" href="{{route('permissions.index')}}">Permissions</a>
            </div>
        </div>
    </li>
@endcan
