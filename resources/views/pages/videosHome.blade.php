@extends('layouts.homelayout')
@section('homeContent')
<style>
    .navbar{position: static;}
</style>
    <main class="container my-5">
        <h2 class="display-2 text-center m-2">Videos</h2>
        <section id="videos">
            <div class="container">
                <div class="row">
                  @foreach ($videos as $v)
                    <div class="col-md-4">
                      <div class="card m-2" style="border: 1px solid #0a999e; overflow:hidden;">
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
    </main>
@endsection