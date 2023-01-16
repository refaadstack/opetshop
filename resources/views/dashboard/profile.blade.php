<li class="nav-item dropdown pe-3">

    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
      <img src="{{ asset('') }}assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
      <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
    </a><!-- End Profile Iamge Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
      <li class="dropdown-header">
        <h6 class="">{{ Auth::user()->name }}</h6>
        <span>{{ Auth::user()->role }}</span>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>My Profile</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      {{-- <li>
        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
          <i class="bi bi-gear"></i>
          <span>Account Settings</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>Need Help?</span>
        </a>
      </li>
      <li> --}}
        <hr class="dropdown-divider">
      </li>

      <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>

    </ul><!-- End Profile Dropdown Items -->
  </li><!-- End Profile Nav -->