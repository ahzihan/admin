<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider mt-0 mb-3"></li>

                @can('access-dashboard')
                    <li> <a class="text-decoration-none" href="{{ route('dashboard') }}"><span> <i class="fas fa-home"></i>
                            </span><span class="hide-menu">Home</span></a></li>
                @endcan

                @can('index-module')
                    <li> <a class="text-decoration-none" href="{{ route('module.index') }}"><span> <i
                                    class="fas fa-list"></i> </span><span class="hide-menu">Module</span></a></li>
                @endcan

                @can('index-permission')
                    <li> <a class="text-decoration-none" href="{{ route('permission.index') }}"><span> <i
                                    class="fas fa-unlock"></i> </span><span class="hide-menu">Permissions</span></a></li>
                @endcan

                @can('index-role')
                    <li> <a class="text-decoration-none" href="{{ route('role.index') }}"><span> <i
                                    class="fas fa-users"></i> </span><span class="hide-menu">Role</span></a></li>
                @endcan

                @can('index-visitor')
                    <li> <a class="text-decoration-none" href="{{ route('visitor.index') }}"><span> <i
                                    class="fas fa-users"></i> </span><span class="hide-menu">Visitor</span></a></li>
                @endcan

            </ul>
        </nav>
    </div>
</aside>
