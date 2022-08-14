@extends('layouts.homelayout')
@section('homeContent')
<style>
    .navbar{position: static;}
</style>
    <main class="container my-5">
        <h2 class="display-2 text-center m-2">Songs</h2>
        <section id="songs">
              <div class="container">
                <div class="row">
                  @foreach ($songs as $s)
                    <div class="col-md-4">
                      <div class="card m-2" style="border: 1px solid #0a999e;">
                        <div class="img-bx">
                          <img src="/songImages/{{$s->image}}">
                          <div class="grid-btn">
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
    </main>
@endsection