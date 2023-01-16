<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#menu-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Menu</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="menu-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            @if (Auth::user()->role =='admin')
              <a href="{{ route('product.index') }}">
                <i class="bi bi-circle"></i><span>Product</span>
              </a>
              <a href="{{ route('category.index') }}">
                <i class="bi bi-circle"></i><span>Category</span>
              </a>
              <a href="{{ route('coupon.index') }}">
                <i class="bi bi-circle"></i><span>Coupon</span>
              </a>
              <a href="{{ route('banner.index') }}">
                <i class="bi bi-circle"></i><span>Banner</span>
              </a>
              <a href="{{ route('transaction.index') }}">
                <i class="bi bi-circle"></i><span>Kelola Transaksi</span>
              </a>
              <a href="{{ route('my-transaction') }}">
                <i class="bi bi-circle"></i><span>Semua Transaksi</span>
              </a>
              <a href="{{ route('user.index') }}">
                <i class="bi bi-circle"></i><span>Pelanggan</span>
              </a>

            @endif
            @if (Auth::user()->role =='customer')
                
              <a href="{{ route('my-transaction') }}">
                <i class="bi bi-circle"></i><span>Transaksi Saya</span>
              </a>
            @endif
            @if (Auth::user()->role =='pemilik')
            <a href="{{ route('user.index') }}">
              <i class="bi bi-circle"></i><span>Kelola Admin</span>
            </a>
            @endif
            </li>
          </ul>
        </li><!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->