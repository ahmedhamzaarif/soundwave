@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Add Videos</h2>

    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
      <div class="col-md-8">
        <form action="{{ route('manageVideos.store') }}" method="POST" enctype="multipart/form-data">
          @csrf 
          <div class="form-group">
            <label for="video_title">Enter Title</label>
            <input type="text" name="video_title" id="video_title" class="form-control">
          </div>
          <div class="form-group">
            <label for="video_desc">Enter Description</label>
            <input type="text" name="video_desc" id="video_desc" class="form-control">
          </div>
          <div class="form-group">
              <label for="video_image">Upload Image</label>
              <input type="file" name="video_image" id="video_image" class="form-control">
          </div>
          <div class="form-group">
              <label for="video_link">Enter Video Url / Link</label>
              <input type="url" name="video_link" id="video_link" class="form-control">
          </div>
          <div class="form-group">
            <label for="video_genre">Select Genre</label>
            <select name="video_genre" id="video_genre" class="form-control">
                <option value="" selected disabled>-- Select --</option>
                @foreach ($genre as $g)
                    <option value="{{ $g->id }}">{{ $g->genre_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="video_artist">Select Artist</label>
            <select name="video_artist" id="video_artist" class="form-control">
              <option value="" selected disabled>-- Select --</option>
                @foreach ($artist as $art)
                    <option value="{{ $art->id }}">{{ $art->artist_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="video_album">Select Album</label>
            <select name="video_album" id="video_album" class="form-control">
              <option value="" selected disabled>-- Select --</option>
                @foreach ($album as $al)
                    <option value="{{ $al->id }}">{{ $al->album_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="video_lang">Select Language</label>
            <select name="video_lang" id="video_lang" class="form-control">
              <option value="" selected disabled>-- Select --</option>
                @foreach ($lang as $l)
                    <option value="{{ $l->id }}">{{ $l->language_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="video_year">Enter Year</label>
            <input type="number" name="video_year" id="video_year" class="form-control" maxlength="4">
          </div>
          <input type="submit" class="btn btn-primary" value="Save changes">
        </form>
      </div>
      <div class="col-md-2"></div>
      </div>
    </div>
@endsection