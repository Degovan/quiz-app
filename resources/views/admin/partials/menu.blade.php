<li class="nav-link {{ request()->is("dashboard") ? "active-sidebar" : "" }}">
    <a href="{{ route("admin.dashboard") }}" class="{{ request()->is("dashboard") ? "link-active-sidebar" : "text-dark " }}">
        <i class="fa fa-tachometer-alt mr-2" aria-hidden="true"></i>
        Dashboard
    </a>
</li>
<li class="nav-link {{ request()->is("quiz/create") ? "active-sidebar" : "" }}">
    <a href="{{ route("quiz.create") }}" class="{{ request()->is("quiz/create") ? "link-active-sidebar" : "text-dark " }}">
        <i class="fas fa-question-circle mr-2"></i>
        Quiz
    </a>
</li>
<li class="nav-link 
    {{ request()->is("account/user") ? "active-sidebar" : "" }}">
    
    <a href="{{ route("account.user") }}" class="
        {{ request()->is("account/user") ? "link-active-sidebar" : "text-dark " }}">
        <i class="fas fa-user-alt  mr-2"></i>
        Users
    </a>
</li>
<li class="nav-link {{ request()->is("account/admin") ? "active-sidebar" : "" }}">
    <a href="{{ route("account.admin") }}" class="{{ request()->is("account/admin") ? "link-active-sidebar" : "text-dark " }}">
        <i class="fas fa-user-lock  mr-2"></i>
        Admin
    </a>
</li>