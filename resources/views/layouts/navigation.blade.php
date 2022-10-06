<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>

    @can('user_management_access')
    <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            User Management
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            @can('permission_access')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.permissions.index') }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-bug') }}"></use>
                    </svg>
                   {{ __('Permission') }}
                </a>
            </li>
            @endcan

            @can('role_access')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.roles.index') }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-bug') }}"></use>
                    </svg>
                   {{ __('Role') }}
                </a>
            </li>
            @endcan
             @can('user_access')
             <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>
                    {{ __('Users') }}
                </a>
            </li>  
             @endcan
        </ul>
    </li>   
    @endcan
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('about') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('About us') }}
        </a>
    </li>
</ul>