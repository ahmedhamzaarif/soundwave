@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Add Songs</h2>

    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
      <div class="col-md-8">
        <form action="{{ route('manageSongs.store') }}" method="POST" enctype="multipart/form-data">
          @csrf 
          <div class="form-group">
            <label for="song_title">Enter Title</label>
            <input type="text" name="song_title" id="song_title" class="form-control">
          </div>
          <div class="form-group">
            <label for="song_desc">Enter Description</label>
            <input type="text" name="song_desc" id="song_desc" class="form-control">
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="song_image">Upload Image</label>
                    <input type="file" name="song_image" id="song_image" class="form-control">
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="song_file">Upload File</label>
                    <input type="file" name="song_file" id="song_file" class="form-control">
                  </div>
            </div>
          </div>
          <div class="form-group">
            <label for="song_genre">Select Genre</label>
            <select name="song_genre" id="song_genre" class="form-control">
                <option value="" selected disabled>-- Select --</option>
                @foreach ($genre as $g)
                    <option value="{{ $g->id }}">{{ $g->genre_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="song_artist">Select Artist</label>
            <select name="song_artist" id="song_artist" class="form-control">
              <option value="" selected disabled>-- Select --</option>
                @foreach ($artist as $art)
                    <option value="{{ $art->id }}">{{ $art->artist_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="song_album">Select Album</label>
            <select name="song_album" id="song_album" class="form-control">
              <option value="" selected disabled>-- Select --</option>
                @foreach ($album as $al)
                    <option value="{{ $al->id }}">{{ $al->album_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="song_lang">Select Language</label>
            <select name="song_lang" id="song_lang" class="form-control">
              <option value="" selected disabled>-- Select --</option>
                @foreach ($lang as $l)
                    <option value="{{ $l->id }}">{{ $l->language_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="song_year">Enter Year</label>
            <input type="number" name="song_year" id="song_year" class="form-control" maxlength="4">
          </div>
          <input type="submit" class="btn btn-primary" value="Save changes">
        </form>
      </div>
      <div class="col-md-2"></div>
      </div>
    </div>
@endsection