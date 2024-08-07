<div data-bs-theme="">
  <nav class="navbar navbar-vertical fixed-start navbar-expand-md" id="sidebar">
    <div class="container-fluid">
  
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <!-- Brand -->
      <a class="navbar-brand" href="index.html">
        <img src="assets/img/logo.svg" class="navbar-brand-img mx-auto" alt="...">
      </a>
  
      <!-- User (xs) -->
      <div class="navbar-user d-md-none">
  
        <!-- Dropdown -->
        <div class="dropdown">
  
          <!-- Toggle -->
          <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-sm avatar-online">
              <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
            </div>
          </a>
  
          <!-- Menu -->
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarIcon">
            <a href="profile-posts.html" class="dropdown-item">Profile</a>
            <a href="account-general.html" class="dropdown-item">Settings</a>
            <hr class="dropdown-divider">
            <a href="sign-in.html" class="dropdown-item">Logout</a>
          </div>
  
        </div>
  
      </div>
  
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidebarCollapse">
  
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge input-group-reverse">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-text">
              <span class="fe fe-search"></span>
            </div>
          </div>
        </form>
  
        <!-- Navigation -->
        <ul class="navbar-nav">
        

          <li class="nav-item">
            <a class="nav-link " href="{{route('dashboard')}}">
              <i class="fe fe-bar-chart"></i> Dashboard
            </a>
          </li>
          
        </ul>
  
        <!-- Divider -->
        <hr class="navbar-divider my-3">
  
        <!-- Heading -->
        <h6 class="navbar-heading">
          Application
        </h6>
  
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-4">
          <li class="nav-item">
            <a class="nav-link " href="{{route('contribution.index')}}">
              <i class="fe fe-briefcase"></i> Contributions|Projects
            </a>
          </li>
        </ul>
        <ul class="navbar-nav mb-md-4">
          <li class="nav-item">
            <a class="nav-link " href="{{route('contribution.index')}}">
              <i class="fe fe-credit-card"></i>Transactions
            </a>
          </li>
        </ul>
       
        <h6 class="navbar-heading">
          Others
        </h6>
  
        <ul class="navbar-nav mb-md-4">
          <li class="nav-item">
            <a class="nav-link " href="{{route('contribution.index')}}">
              <i class="fe fe-settings"></i>Settings
            </a>
          </li>
        </ul>

        <ul class="navbar-nav mb-md-4">
          <li class="nav-item">
            <a class="nav-link " href="{{route('contribution.index')}}">
              <i class="fe fe-users"></i>Users
            </a>
          </li>
        </ul>

        <ul class="navbar-nav mb-md-4">
          <li class="nav-item">
            <a class="nav-link " href="{{route('contribution.index')}}">
              <i class="fe fe-folder"></i>Getting Started
            </a>
          </li>
        </ul>

        <!-- Push content down -->
        <div class="mt-auto"></div>
  
          <!-- Customize -->
        
          <div id="popoverDemoContainer" data-bs-theme="dark"></div>
  
          <!-- User (md) -->
          <div class="navbar-user d-none d-md-flex" id="sidebarUser">
  
            <!-- Icon -->
            <a class="navbar-user-link" data-bs-toggle="offcanvas" href="#sidebarOffcanvasActivity" aria-controls="sidebarOffcanvasActivity">
              <span class="icon">
                <i class="fe fe-bell"></i>
              </span>
            </a>
  
            <!-- Dropup -->
            <div class="dropup">
  
              <!-- Toggle -->
              <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                  <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                </div>
              </a>
  
              <!-- Menu -->
              <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                <a href="profile-posts.html" class="dropdown-item">Profile</a>
                <a href="account-general.html" class="dropdown-item">Settings</a>
                <hr class="dropdown-divider">
                <a href="sign-in.html" class="dropdown-item">Logout</a>
              </div>
  
            </div>
  
            <!-- Icon -->
            <a class="navbar-user-link btn">
              <span class="icon">
                <i class="fe fe-log-out"></i>
              </span>
            </a>
  
          </div>
  
      </div> <!-- / .navbar-collapse -->
  
    </div>
  </nav>
</div>