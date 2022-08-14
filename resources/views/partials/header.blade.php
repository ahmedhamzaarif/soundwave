
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="/">
              <img src="{{ asset('admin/images/logo/logo-full-light-transparent.png') }}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="/">
              <img src="{{ asset('admin/images/logo/logo-transparent.png') }}" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top"> 
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">Admin</span></h1>
              <h3 class="welcome-sub-text">Your performance summary</h3>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item" style="background-color: white; line-height:2rem; height: 2rem; width:2rem; border-radius:50%;">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                <i class="mdi mdi-power text-primary" style="font-size: 2rem;"></i>
              </a>
              <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/redirects">
                <i class="mdi mdi-view-dashboard  menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">Content Management</li>
            
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#cat-elements" aria-expanded="false" aria-controls="cat-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="cat-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="/genre">Genre</a></li>
                    <li class="nav-item"><a class="nav-link" href="/artist">Artist</a></li>
                    <li class="nav-item"><a class="nav-link" href="/album">Album</a></li>
                    <li class="nav-item"><a class="nav-link" href="/language">Languages</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#songs-elements" aria-expanded="false" aria-controls="songs-elements">
                <i class="menu-icon mdi mdi-microphone "></i>
                <span class="menu-title">Songs</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="songs-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('manageSongs.create') }}">Add Songs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('manageSongs.index') }}">View Songs</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#videos-elements" aria-expanded="false" aria-controls="videos-elements">
                <i class="menu-icon mdi mdi-video "></i>
                <span class="menu-title">Videos</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="videos-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('manageVideos.create') }}">Add Videos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('manageVideos.index') }}">View Videos</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item nav-category">User Management</li>

            <li class="nav-item">
                <a class="nav-link" href="/users">
                  <i class="menu-icon mdi mdi-account-box-outline"></i>
                  <span class="menu-title">Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#review-elements" aria-expanded="false" aria-controls="review-elements">
                  <i class="menu-icon mdi mdi-message-text-outline "></i>
                  <span class="menu-title">Reviews</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="review-elements">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"><a class="nav-link" href="sReview">Song Reviews</a></li>
                      <li class="nav-item"><a class="nav-link" href="vReview">Video Reviews</a></li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#rating-elements" aria-expanded="false" aria-controls="rating-elements">
                  <i class="menu-icon mdi mdi-star-outline"></i>
                  <span class="menu-title">Ratings</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="rating-elements">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"><a class="nav-link" href="sRating">Song Ratings</a></li>
                      <li class="nav-item"><a class="nav-link" href="vRating">Video Ratings</a></li>
                  </ul>
                </div>
              </li>
          </ul>
        </nav>