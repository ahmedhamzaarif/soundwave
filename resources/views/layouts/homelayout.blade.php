<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoundWave | Entertainment Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

      <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/logo/favicon.ico') }}">
    <!-- endinject -->
    
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

  </head>

  <style>
    :root{accent-color: #0a999e;}
    ::selection {background: #0a999e; color:white;}
    body{font-family: 'Poppins', sans-serif !important;}
    .navbar-nav li a{font-size: 0.9rem; color: #555 !important;}
    .navbar-nav li a:focus,
    .navbar-nav li a:hover{color: #000 !important; font-weight: 500;}
    .navbar-nav{justify-content: space-between;}
    .card{border-radius: 10px; padding: 5px;}
    .bg-primary{background: #0a999e !important; border: 1px solid #0a999e;}
    #about p{font-size: 1.5rem; line-height: 2rem;}
    #songs .card{overflow: hidden; padding-right: 0; padding-left: 0;}
    #songs .img-bx{margin-left: 5px; margin-right: 5px; overflow: hidden;}
    #songs .desc{padding: 5px;}
    #songs .card:hover,
    #videos .card:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;}
    #songs img{width: 100%; height: auto;}
    #songs .card:hover img{transform: scale(1.2); transition: 0.3s;}
    #songs h4{position: relative; z-index:2; background:white; width: 100%;}
    #songs p, #videos p{display: flex; justify-content: space-evenly;}
    #songs audio{border-radius: 10px; background-color: #f8f9fa; width: 95%; display: flex; margin: auto;}
    #videos img:hover{transform: scale(1.1); overflow: hidden;}
    #videos h4{position: relative; z-index:2; background:white; width: 100%;}
    /* .mdi{color: #0a999e} */
    .navbar{position: fixed; width: 100%; z-index: 100; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;}
    .navbar-brand img{height: 50px;}
    .navbar-nav li a{text-decoration: none; color: black; font-weight:400;}
    .navbar-nav li a.active{color: #1f3bb3;}
    .display-3,
    .display-4,{font-weight:400;}
    .footer-brand img{height:50px;}
    .footer .mdi{height: 50px;}
    .socialIcons a{text-decoration: none; margin: auto 2px;}
    .socialIcons a .mdi{text-decoration: none; border-radius: 50%;  background: #0a999e; color: white; height: 40px; width: 40px; margin:auto; display:flex; justify-content: left !important; padding: 0.5rem; border: 0; font-size: 1.5rem;}
    #team img {border-top-right-radius: 2rem; border-bottom-left-radius: 2rem; border: 1px solid #ccc; box-shadow:  rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;}
    /* btn */
    .btn-outline-primary{border-color: rgb(9,152,157);}
    .btn-primary, .btn-outline-primary:hover{background: rgb(9,152,157); background: linear-gradient(90deg, rgba(9,152,157,1) 37%, rgba(52,228,234,1) 100%) !important; border: rgb(9,152,157);}
    .btn-primary:hover{ background: rgb(9,152,157); background: linear-gradient(266deg, rgba(9,152,157,1) 37%, rgba(52,228,234,1) 100%) !important; border: rgb(9,152,157);}
    /* grid-btn */
    .grid-btn{display:flex; justify-content: space-around;
    position: absolute; z-index: 1; bottom: 4rem; width:100%}
    /* .grid-btn .mdi{text-decoration: none; border-radius: 50%; background: #0a999e; color: white; height: 3rem; width: 3rem; margin: auto; display: flex; padding: 0.5rem; border: 0; font-size: 2rem; line-height:2rem;} */
    .mdi-download{font-size: 1.2rem;align-self: center;display: flex;}
    .download a{text-decoration: none}
    #songs .card:hover .grid-btn{bottom:10rem; transition:all 0.5s ease-in-out;}
    #songs .card .desc{position: relative; z-index: 2;}
    /* footer */
    .footer .mdi{font-size:1rem; padding-right: 0.2rem;}
    .footer ul{padding: 0;}
    .footer ul li{ list-style-type:none;}
    .footer ul li{font-size: 0.9rem; color: #555; text-decoration: none;}
    .footer ul li:hover{color: #000;}
    .footer ul li a{font-size: 0.9rem; color: #555; text-decoration: none;}
    .footer ul li a:hover{color: #000;}
    .footer p{font-size: 1rem;}
    .footer .newsletter-bx input[type="email"]{/*border-radius: 50px;*/ height:42px;}
    /* .footer .newsletter-bx .btn{width: 100%;}
    .socialIcons.d-flex {justify-content: space-evenly;} */
    .footer .newsletter-bx button[type="submit"]{padding: auto; margin: auto;}
    .footer .newsletter-bx button[type="submit"].btn {border-radius: 10px; padding: 4px;}
    .mdi.mdi-chevron-right{font-size: 2rem; padding: 0; margin: 0; line-height: 2rem;}
    @media (max-width: 991px){
      .navbar-collapse{display:block;}
      .navbar-collapse div a.btn{display: block;width: fit-content;margin-bottom: 10px;}
    }
    @media (max-width: 820px){
      #carouselExampleFade{margin-top: 4rem;}
    }
    @media (max-width: 414px){
      #songs .d-flex.justify-content-center{justify-content: start !important;}
      #songs .d-flex span:nth-child(1){text-align: start !important; margin-right: 1rem !important; margin-left: 1rem !important;}
      #songs .d-flex span:nth-child(2){position: absolute !important; right: 0 !important;}
      
      #videos .d-flex.justify-content-center{justify-content: start !important;}
      #videos .d-flex span:nth-child(1){text-align: start !important; margin-right: 1rem !important; margin-left: 1rem !important;}
      #videos .d-flex span:nth-child(2){position: absolute !important; right: 0 !important;}
    }
  </style>

  <body class="homePage bg-light">
    {{-- header --}}
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="{{ asset('admin/images/logo/logo-full-light-transparent.png') }}" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewSongs">Songs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewVideos">Videos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#team">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#contactUs">Contact Us</a>
            </li>
          </ul>
          <div>
            <a href="{{ route('login') }}" class="btn btn-rounded btn-outline-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-rounded btn-primary">Register</a>
            {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-rounded btn-outline-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-rounded btn-outline-primary">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-rounded btn-primary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
          </div>
        </div>
      </div>
    </nav>

    @yield('homeContent')

</main>

  
{{-- footer --}}
<footer class="footer bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <h3 class="display-4">Our Company</h3>
        <ul>
          <li><i class="mdi mdi-map-marker"></i>1st Floor A.P.W.A. Complex Opp. IBA City Campus,<br> Garder East, Karachi</li>
          <li><a href="tel:+923212358418"><i class="mdi mdi-phone"></i>+923212358418</a></li>
          <li><a href="https://wa.me/+923212358418"><i class="mdi mdi-whatsapp"></i>+923212358418</a></li>
          <li><a href="mailto:ahmedarif2882@gmail.com"><i class="mdi mdi-email-outline"></i></a>info@soundwave.com</li>
        </ul>
      </div>
      <div class="col-md-3">
        <h3 class="display-4">Quick Links</h3>
        <ul>
          <li><a href="#">National Songs</a></li>
          <li><a href="#">Coke Studio</a></li>
          <li><a href="#">Ali Zafar</a></li>
          <li><a href="#">Urdu Songs</a></li>
        </ul>

      </div>
      <div class="col-md-4">
        <h3 class="display-4">Stay in Touch</h3>
        <p class="text-secondary">Follow us on social media.</p>
        {{-- <div class="newsletter-bx">
          <form action="">
            <div class="form-group form-inline">
              <input type="email" class="form-inline">
              <button type="submit" value="" class="btn btn-sm btn-primary"><i class="mdi mdi-chevron-right"></i></button>
            </div>
          </form>
        </div> --}}
        <div class="socialIcons d-flex">
          <a href="#"><i class="mdi icon-md mdi-facebook-box"></i></a>
          <a href="#"><i class="mdi icon-md mdi-linkedin"></i></a>
          <a href="#"><i class="mdi icon-md mdi-instagram"></i></a>
          <a href="#"><i class="mdi icon-md mdi-twitter"></i></a>
        </div>

      </div>
    </div>
    <div id="footer-content" class="d-sm-flex justify-content-center justify-content-sm-between mt-3">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">&copy; SoundWave</span>
      <span class="text-muted text-center d-block d-sm-inline-block float-none">Built with <b>Laravel</b> & <b>Php</b></span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
    </div>
  </div>
</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>
