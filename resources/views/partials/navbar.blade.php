<!-- Sidebar -->
<div class="sidebar" id="mainSidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <div class="logo-header" data-background-color="dark">
      <a href="{{ route('home') }}" class="logo">
        <img src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" height="20" />
      </a>
      <button class="btn btn-toggle" id="sidebarToggleBtn" aria-label="Toggle sidebar">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item @if(request()->routeIs('home')) active @endif">
          <a href="{{ route('home') }}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item @if(request()->routeIs('pelanggan.*')) active @endif">
          <a href="{{ route('pelanggan.index') }}">
            <i class="fas fa-users"></i>
            <p>Pelanggan</p>
          </a>
        </li>
        <li class="nav-item @if(request()->routeIs('produk.*')) active @endif">
          <a href="{{ route('produk.index') }}">
            <i class="fas fa-box-open"></i>
            <p>Produk</p>
          </a>
        </li>
        <li class="nav-item @if(request()->routeIs('pemasok.*')) active @endif">
          <a href="{{ route('pemasok.index') }}">
            <i class="fas fa-user-check"></i>
            <p>Pemasok</p>
          </a>
        </li>
        <li class="nav-item @if(request()->routeIs('transaksi.*')) active @endif">
          <a href="{{ route('transaksi.index') }}">
            <i class="fas fa-luggage-cart"></i>
            <p>Transaksi</p>
          </a>
        </li>
        <li class="nav-item @if(request()->routeIs('inventaris.*')) active @endif">
          <a href="{{ route('inventaris.index') }}">
            <i class="fas fa-cogs"></i>
            <p>Inventaris</p>
          </a>
        </li>
        <li class="nav-item @if(request()->routeIs('staff.*')) active @endif">
          <a href="{{ route('staff.index') }}">
            <i class="fas fa-user-tie"></i>
            <p>Staff</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->

<style>
.sidebar {
  width: 220px;
  min-width: 60px;
  max-width: 100vw;
  height: 100vh;
  min-height: 0;
  background: #232946;
  color: #fff;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1000;
  display: flex;
  flex-direction: column;
  transition: width 0.25s cubic-bezier(.4,0,.2,1), left 0.25s cubic-bezier(.4,0,.2,1);
}
.sidebar.closed {
  width: 60px;
  min-width: 60px;
  overflow: hidden;
}
.sidebar-logo {
  width: 100%;
  background: #232946;
  border-bottom: 1px solid #2d325a;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 10px;
}
.btn-toggle {
  background: none;
  border: none;
  color: #fff;
  font-size: 1.3em;
  outline: none;
  box-shadow: none;
  margin-left: 8px;
}
.nav-secondary {
  padding-left: 0;
  margin-top: 24px;
}
.nav-secondary .nav-item {
  margin-bottom: 6px;
}
.nav-secondary .nav-item a {
  display: flex;
  align-items: center;
  color: #eaeaea;
  text-decoration: none;
  padding: 10px 24px;
  font-size: 1em;
  border-radius: 0 18px 18px 0;
  transition: background 0.16s, color 0.16s;
}
.nav-secondary .nav-item.active a, .nav-secondary .nav-item a:hover {
  background: #007bff;
  color: #fff;
}
.nav-secondary .nav-item i {
  min-width: 22px;
  text-align: center;
  font-size: 1.1em;
  margin-right: 8px;
}
.sidebar.closed .nav-secondary .nav-item a p {
  display: none;
}
.sidebar.closed .nav-secondary .nav-item a {
  justify-content: center;
  padding: 10px 0;
}
.sidebar.closed .logo-header .logo span,
.sidebar.closed .logo-header .logo img {
  display: block;
  margin: 0 auto;
}
.sidebar.closed .logo-header .logo {
  justify-content: center;
}
@media (max-width: 991px) {
  .sidebar {
    left: -220px;
    width: 220px;
    transition: left 0.25s cubic-bezier(.4,0,.2,1);
  }
  .sidebar.open {
    left: 0;
  }
  .sidebar.closed {
    left: -220px;
    width: 220px;
  }
}
/* Content padding adjustment */
@media (min-width: 992px) {
  body, .main-panel, .content, .page-inner {
    padding-left: 220px !important;
    box-sizing: border-box;
    transition: padding-left 0.25s cubic-bezier(.4,0,.2,1);
  }
  .sidebar.closed ~ .main-panel,
  .sidebar.closed ~ .content,
  .sidebar.closed ~ .page-inner {
    padding-left: 60px !important;
  }
}
@media (max-width: 991px) {
  body, .main-panel, .content, .page-inner {
    padding-left: 0 !important;
  }
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var sidebar = document.getElementById('mainSidebar');
  var toggleBtn = document.getElementById('sidebarToggleBtn');
  function setSidebarState() {
    if(window.innerWidth > 991) {
      sidebar.classList.remove('open');
      sidebar.classList.remove('closed');
    } else {
      sidebar.classList.remove('open');
      sidebar.classList.add('closed');
    }
  }
  if (toggleBtn) {
    toggleBtn.addEventListener('click', function() {
      if(window.innerWidth > 991) {
        sidebar.classList.toggle('closed');
      } else {
        sidebar.classList.toggle('open');
      }
    });
  }
  setSidebarState();
  window.addEventListener('resize', setSidebarState);
});
</script>