<div class="header mt-md-5">
    <div class="header-body">
      <div class="row align-items-center">
        <div class="col">

          <!-- Pretitle -->
          <h6 class="header-pretitle">
            Overview
          </h6>

          <!-- Title -->
          <h1 class="header-title">
            Settings
          </h1>

        </div>
      </div> <!-- / .row -->
      <div class="row align-items-center">
        <div class="col">
          <!-- Nav -->
          <ul class="nav nav-tabs nav-overflow header-tabs" id="tab-menu">
            <li class="nav-item">
              <a href="{{route('settings.index')}}" class="nav-link ">
                Account
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('settings.app')}}" class="nav-link">
                Application
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('settings.users')}}" class="nav-link">
                Users
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('settings.security')}}" class="nav-link">
                Security
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('settings.notifications')}}" class="nav-link">
                Notifications
              </a>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
        var currentUrl = window.location.href;
        $('#tab-menu .nav-link').each(function() {
            if (this.href === currentUrl) {
                $('#tab-menu .nav-link').removeClass('active');
                $(this).addClass('active');
            }
        });

    });
</script>