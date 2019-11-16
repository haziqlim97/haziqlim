<div class="sidebar" data-color="white" data-active-color="danger">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="../assets/img/logo-small.png">
            </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ config('app.name', 'Laravel') }}
            <!-- <div class="logo-image-big">
              <img src="../assets/img/logo-big.png">
            </div> -->
            </a>
        </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class=" {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            @permission('read-customer')
            <li class=" {{ Request::is('customer/*') ? 'active' : '' }}">
                <a href="{{ route('customer:index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Customers</p>
                </a>
            </li>
            @endpermission

            @permission('read-user')
            <li class=" {{ Request::is('user/*') ? 'active' : '' }}">
                <a href="{{ route('user:index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Users</p>
                </a>
            </li>
            @endpermission
            @permission('read-roles')
            <li class=" {{ Request::is('role/*') ? 'active' : '' }}">
                <a href="{{ route('role:index') }}">
                    <i class="nc-icon nc-lock-circle-open"></i>
                    <p>Roles</p>
                </a>
            </li>
            @endpermission
            @permission('read-permission')
            <li class=" {{ Request::is('permission/*') ? 'active' : '' }}">
                <a href="{{ route('permission:index') }}">
                    <i class="nc-icon nc-key-25"></i>
                    <p>Permissions</p>
                </a>
            </li>
            @endpermission
        </ul>
    </div>
</div>