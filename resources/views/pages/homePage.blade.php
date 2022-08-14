@extends('layouts.homelayout')

@section('homeContent')
{{-- slider --}}
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('home/slide1.jpg') }}" class="d-block w-100" alt="slide1">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('home/slide2.jpg') }}" class="d-block w-100" alt="slide2">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    {{-- main section --}}
    <main class="container my-5">
      {{-- About --}}
      <section id="about">
        <div class="container">
          <h2 class="display-3 text-center">What is SoundWave?</h2>
          <p class="text-center text-secondary">SoundWave allows you to listen to, watch, and download new MP3 songs online. On SoundWave, you can download new or old Pakistani songs in Urdu, Sindhi, Pashto, and other languages.</p>
        </div>
      </section>

      {{-- Songs --}}
      <section id="songs">
        <div class="d-flex justify-content-center">
          <span class="display-3 text-center bg-light m-5">Latest Songs</span>
          <span class="text-primary m-5" style="align-self: center; position: absolute; right:8rem"><a href="/viewSongs" class="text-decoration-none text-primary">View More</a></span>
        </div>
          <div class="container">
            <div class="row">
              @foreach ($songs as $s)
                <div class="col-md-4">
                  <div class="card m-2" style="border: 1px solid #0a999e;">
                    <div class="img-bx">
                      <img src="/songImages/{{$s->image}}">
                      <div class="grid-btn">
                        {{-- <span><a href="" class="mdi mdi-star"></a></span>
                        <span><a href="" class="mdi mdi-comment-text-outline"></a></span>
                        <span><a href="/songs/{{$s->file}}" download class="mdi mdi-download"></a></span> --}}
                        <span class="download"><a href="/songs/{{$s->file}}" download><span class="mdi mdi-download btn btn-primary">Download</span></a></span>
                      </div>
                    </div>
                    
                    <div class="desc bg-white">
                      <h4 class="text-center my-1">{{ $s->title }}</h4>
                      <h6 class="text-center text-gray">By {{ $s->artist_name }}</h6>
                      <p><span class="badge bg-primary">{{ $s->language_name }}</span><span class="badge bg-primary">{{ $s->album_name }}</span><span class="badge bg-primary">{{ $s->year }}</span></p>
                      <audio src="/songs/{{$s->file}}" width="100%" controls></audio>
                    </div>
                  </div>  
                </div>
              @endforeach
            </div>              
          </div>
        </div>
      </section>
    
      {{-- Videos --}}
      <section id="videos">
        <div class="d-flex justify-content-center">
          <span class="display-3 text-center bg-light m-5">Latest Videos</span>
          <span class="text-primary m-5" style="align-self: center; position: absolute; right:8rem"><a href="/viewVideos" class="text-decoration-none text-primary">View More</a></span>
        </div>
        <div class="container">
            <div class="row">
              @foreach ($videos as $v)
                <div class="col-md-4">
                  <div class="card m-2" style="border: 1px solid #0a999e; overflow:hidden;">
                    {{-- <a href="{{$v->file}}" target="_blank">
                      <img src="videoImages/{{$v->image}}" height="183px" width="100%">
                    </a> --}}
                    <iframe width="100%" height="183px" src="{{ $v->file }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <h4 class="text-center p-1">{{ $v->title }}</h4>
                    <h6 class="text-center text-gray">By {{ $v->artist_name }}</h6>
                    <p><span class="badge bg-primary">{{ $v->language_name }}</span><span class="badge bg-primary">{{ $v->album_name }}</span><span class="badge bg-primary">{{ $v->year }}</span></p>
                  </div>
                </div>
              @endforeach
            </div>              
          </div>
        </div>
      </section>

      {{-- Team --}}
      <section id="team">
        <div class="display-4 text-center bg-light m-5">Our Team</div>
        <div class="container">
          <div class="row text-center">
            <div class="col-md-3">
              <img src="{{ asset('/home/team/AhmedHamza.jpg') }}" alt="" width="100%">
              <h4 class="m-2">Ahmed Hamza</h4>
              <p>Laravel Developer<br>& Front-end Developer</p>
              {{-- <div class="team-info">
                <i class="mdi mdi-facebook"></i>
                <i class="mdi mdi-instagram"></i>
                <i class="mdi mdi-linkedin"></i>
              </div> --}}
            </div>
            <div class="col-md-3"><img src="{{ asset('/home/team/AhsanRaza.jpeg') }}" alt="" width="100%"><h4 class="m-2">Ahsan Raza</h4><p>Php Developer <br> & Front-end Developer</p></div>
            <div class="col-md-3"><img src="{{ asset('/home/team/avatar.png') }}" alt="" width="100%"><h4 class="m-2">Talha.</h4><p>React Developer</p></div>
            <div class="col-md-3"><img src="{{ asset('/home/team/avatar.png') }}" alt="" width="100%"><h4 class="m-2">Ahmed Rashid</h4><p>Social Media Manager</p></div>
          </div>
        </div>
      </section>

      {{-- Contact Us --}}
      <section class="contactUs container mx-auto" id="contactUs">
        <div class="display-4 text-center bg-light m-5">Contact Us</div>

        <div class="row justify-content-around">
          <div class="col-md-6">
            <div class="px-3 py-4" id="map">
              <h3 class="display-4 text-center">Map</h3>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3791.1043029805796!2d67.0221329925159!3d24.86711885262339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e6b1566c46f%3A0x65318f4eb62c7aa8!2sAptech%20Computer%20Education%20Garden%20Center!5e0!3m2!1sen!2s!4v1659379676597!5m2!1sen!2s" width="100%" height="220px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
          <div class="col-md-6">
            <div class="px-3 py-4">
              <h3 class="display-4 text-center">Feedback Form</h3>
              <form target="_blank" action="https://formsubmit.co/ahmedarif2882@gmail.com" method="POST">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                  <textarea placeholder="Your Message" class="form-control" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-rounded btn-block">Submit</button>
              </form>
            </div>
          </div>

        </div>
      </section>
    
      
@endsection()