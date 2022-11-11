<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{ url('admin/dashboard') }}"><img src="assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span> Pengaturan</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ url('admin/update-admin-password') }}">Update Password</a></li>
                        <li><a href="{{ url('admin/update-admin-profile') }}">Update Profil</a></li>
                    </ul>
                </li>
                <li>
                    <a href="components.html"><img src="assets/img/icons/product.svg" alt="img"><span> Single Menu</span> </a>
                </li>
            </ul>
        </div>
    </div>
</div>
