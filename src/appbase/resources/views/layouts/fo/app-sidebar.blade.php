<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <!-- Home -->
    <li class="nav-item has-treeview menu-open">
      <a href="{{ route('absen') }}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Home
        </p>
      </a>
    </li>

    <!-- Daftar Absensi -->
    <li class="nav-item has-treeview menu-open">
      <a href="{{ route('absen.all') }}" class="nav-link">
        <i class="nav-icon fas fa-list"></i>
        <p>
          Daftar Absensi
        </p>
      </a>
    </li>

    <!-- Logout -->
    <li class="nav-item has-treeview menu-open">
      <a href="{{ route('logout') }}" class="nav-link"
         onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
         <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>

    </li>

  </ul>
</nav>
<!-- /.sidebar-menu -->
