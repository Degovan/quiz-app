<li class="nav-link {{ request()->is("user/dashboard") ? "active-sidebar" : "" }}">
    <a href="{{ route("admin.dashboard") }}" class="{{ request()->is("user/dashboard") ? "link-active-sidebar" : "text-dark " }}">
        <i class="fa fa-tachometer-alt mr-2" aria-hidden="true"></i>
        Dashboard
    </a>
</li>