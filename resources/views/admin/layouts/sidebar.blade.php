<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}" href="/admin/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/menu*') ? 'active' : '' }}" href="/admin/menu">
            <span data-feather="file-text"></span>
            Menu
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/kategori*') ? 'active' : '' }}" href="/admin/kategori">
            <span data-feather="file-text"></span>
            Kategori
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="shopping-cart"></span>
            Orders
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Reports
          </a>
        </li>
      </ul>
      @can('user') 
      {{-- variable user ngambil dari folder provider appserviceprovider --}}
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Menu User</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          {{-- <span data-feather="plus-circle"></span> --}}
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}" href="/admin/user">
            <span data-feather="users"></span>
            User
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Current month
          </a>
        </li>
      </ul>
      @endcan
    </div>
  </nav>
