<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('admin/dashboard') }}"><img src="{{ asset('admin/assets/img/icons/dashboard.svg') }}" alt="img"><span> Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ Request::is('admin/sektors') || Request::is('admin/add-sektor') || Request::is('admin/edit-sektor/*') ? 'active' : '' }}"><img src="{{ asset('admin/assets/img/icons/product.svg') }}" alt="img"></i><span> Data Master</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ url('admin/sektors') }}" class="{{ Request::is('admin/sektors') || Request::is('admin/add-sektor') || Request::is('admin/edit-sektor/*') ? 'active' : '' }}">Sektor</a></li>
                        <li><a href="{{ url('admin/update-admin-profile') }}" class="">Kategori</a></li>
                        <li><a href="{{ url('admin/update-admin-profile') }}" class="">Emiten</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ Request::is('admin/update-admin-password') || Request::is('admin/update-admin-password') ? 'active' : '' }}"><img src="{{ asset('admin/assets/img/icons/settings.svg') }}" alt="img"><span> Pengaturan</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ url('admin/update-admin-password') }}" class="{{ Request::is('admin/update-admin-password') ? 'active' : '' }}">Update Password</a></li>
                        <li><a href="{{ url('admin/update-admin-profile') }}" class="{{ Request::is('admin/update-admin-profile') ? 'active' : '' }}">Update Profil</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
