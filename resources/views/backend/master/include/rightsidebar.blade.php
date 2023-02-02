<ul class="dropdown-menu dropdown-menu-right">
    <li>
    <a class="dropdown-link-item" href="user-profile.html">
        <i class="mdi mdi-account-outline"></i>
        <span class="nav-text">My Profile</span>
    </a>
    </li>
    <li>
    <a class="dropdown-link-item" href="email-inbox.html">
        <i class="mdi mdi-email-outline"></i>
        <span class="nav-text">Message</span>
        <span class="badge badge-pill badge-primary">24</span>
    </a>
    </li>
    <li>
    <a class="dropdown-link-item" href="user-activities.html">
        <i class="mdi mdi-diamond-stone"></i>
        <span class="nav-text">Activitise</span></a>
    </li>
    <li>
    <a class="dropdown-link-item" href="user-account-settings.html">
        <i class="mdi mdi-settings"></i>
        <span class="nav-text">Account Setting</span>
    </a>
    </li>
    <li class="dropdown-footer">
    <a class="dropdown-link-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  <i class="mdi mdi-logout"></i> Log Out </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </li>                 
</ul>