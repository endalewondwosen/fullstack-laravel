<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
      <!-- Sidebar toggle button -->
      <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <!-- search form -->
      <div class="search-form d-none d-lg-inline-block">
        <div class="input-group">
          <button type="button" name="search" id="search-btn" class="btn btn-flat">
            <i class="mdi mdi-magnify"></i>
          </button>
          <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc."
            autofocus autocomplete="off" />
        </div>
        <div id="search-results-container">
          <ul id="search-results"></ul>
        </div>
      </div>

      <div class="navbar-right ">
        <ul class="nav navbar-nav">
          <!-- Github Link Button -->
          <li class="github-link mr-3">
            <a class="btn btn-outline-secondary btn-sm" href="https://github.com/tafcoder/sleek-dashboard" target="_blank">
              <span class="d-none d-md-inline-block mr-2">Source Code</span>
              <i class="mdi mdi-github-circle"></i>
            </a>

          </li>
          <li class="dropdown notifications-menu">
            <button class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-header">You have 5 notifications</li>
              <li>
                <a href="#">
                  <i class="mdi mdi-account-plus"></i> New user registered
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-account-remove"></i> User deleted
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12 PM</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-account-supervisor"></i> New client
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-server-network-off"></i> Server overloaded
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05 AM</span>
                </a>
              </li>
              <li class="dropdown-footer">
                <a class="text-center" href="#"> View All </a>
              </li>
            </ul>
          </li>
          <!-- User Account -->
          <li class="dropdown user-menu">
            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <img src="{{ Auth::User()->profile_photo_url }}" class="user-image" alt="User Image" />
              <span class="d-none d-lg-inline-block">{{ Auth::user()->name; }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <!-- User image -->
              <li class="dropdown-header">
                <img src="{{ Auth::User()->profile_photo_url }}" class="user-image" alt="User Image" />                        <div class="d-inline-block">
                  {{ Auth::user()->name; }}<small class="pt-1">{{ Auth::user()->email; }}</small>
                </div>
              </li>

              <li> 
                <a href="{{ route('profile.update') }}">
                  <i class="bi bi-person"></i> My Profile
                </a>
              </li>
              <li>
                <a href="{{ route('change.password') }}">
                  <i class="bi bi-lock"></i> Change Password
                </a>
              </li>
              {{-- <li>
                <a href="{{ route('change.password') }}">
                  <i class="mdi mdi-email"></i> Message
                </a>
              </li> --}}
              <li>
                <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
              </li>
              <li>
                <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
              </li>

              <li class="dropdown-footer">
                <a href="{{ route('user.logout') }}"> <i class="mdi mdi-logout"></i> Log Out </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>


  </header>