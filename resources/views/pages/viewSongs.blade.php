@extends('layouts.applayout')

@section('content')

    <h2 class="text-center">View Songs</h2>

    <div class="container" style="overflow-x: scroll">
        <table class="table table-striped table-light mt-4">
            <thead>
                <th>S.No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Genre</th>
                <th>Album</th>
                <th>Artist</th>
                <th>Language</th>
                <th>Year</th>
                <th>Image</th>
                <th>File</th>
                <th>Action</th>
            </thead>
            <tbody id="showSong">
                @foreach ($songs as $s)
                    <tr id="songRow">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->title }}</td>
                        <td>{{ $s->description }}</td>
                        <td>{{ $s->genre_name }}</td>
                        <td>{{ $s->album_name }}</td>
                        <td>{{ $s->artist_name }}</td>
                        <td>{{ $s->language_name }}</td>
                        <td>{{ $s->year }}</td>
                        <td><img src="/songImages/{{$s->image}}"></td>
                        <td><audio controls><source src="/songs/{{$s->file}}" type="audio/mpeg"></audio></td>
                        <td>
                            <button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $s->id }}" data-bs-toggle="modal" data-bs-target="#editSong"></button>
                            <button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $s->id }}"></button>
                        </td>
                    </tr>                
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Edit Song Modal -->
    <div class="modal fade" id="editSong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Song</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <input type="hidden" id="edit_song_id">
              <div class="form-group">
                <label for="edit_song_title">Enter Title</label>
                <input type="text" name="edit_song_title" id="edit_song_title" class="form-control">
              </div>
              <div class="form-group">
                <label for="edit_song_desc">Enter Description</label>
                <input type="text" name="edit_song_desc" id="edit_song_desc" class="form-control">
              </div>
              <div class="form-group">
                <label for="edit_song_genre">Select Genre</label>
                <select name="edit_song_genre" id="edit_song_genre" class="form-control">
                    <option value="" selected disabled>-- Select --</option>
                    @foreach ($genre as $g)
                        <option value="{{ $g->id }}">{{ $g->genre_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="edit_song_artist">Select Artist</label>
                <select name="edit_song_artist" id="edit_song_artist" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($artist as $art)
                        <option value="{{ $art->id }}">{{ $art->artist_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="edit_song_album">Select Album</label>
                <select name="edit_song_album" id="edit_song_album" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($album as $al)
                        <option value="{{ $al->id }}">{{ $al->album_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="edit_song_lang">Select Language</label>
                <select name="edit_song_lang" id="edit_song_lang" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($lang as $l)
                        <option value="{{ $l->id }}">{{ $l->language_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="edit_song_year">Enter Year</label>
                <input type="number" name="edit_song_year" id="edit_song_year" class="form-control" maxlength="4">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="upd_song">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    
          $('.btnEdit').on('click', function(){
            var id = $(this).val();
            $.ajax({
              url: 'getSong/'+id,
              type: 'GET',
              success: function(data){
                // console.log(data); 
                $.each(data, function(k, val){
                //   console.log(val['title']); 
                  $('#edit_song_id').val(val['id']);
                  $('#edit_song_title').val(val['title']);
                  $('#edit_song_desc').val(val['description']);
                  $('#edit_song_genre').val(val['genre_id']);
                  $('#edit_song_artist').val(val['artist_id']);
                  $('#edit_song_album').val(val['album_id']);
                  $('#edit_song_lang').val(val['lang_id']);
                  $('#edit_song_year').val(val['year']);
                })
              }
            })
          });
    
        $('#upd_song').on('click', function(){
            var id = $('#edit_song_id').val();
            var title = $('#edit_song_title').val();
            var desc = $('#edit_song_desc').val();
            var genre = $('#edit_song_genre').val();
            var artist = $('#edit_song_artist').val();
            var album = $('#edit_song_album').val();
            var lang = $('#edit_song_lang').val();
            var year = $('#edit_song_year').val();
            $.ajax({
              url: 'updSong/'+id+'/'+title+'/'+desc+'/'+genre+'/'+artist+'/'+album+'/'+lang+'/'+year,
              type: 'POST',
              success: function(data){
                location.reload();
              }
            })
          });
    
          $('.btnDel').on('click', function(){
            var delId = $(this).val();
            var count = 0;
            console.log(delId);
            $.ajax({
              url: 'delSong/'+delId,
              type: 'GET',
              success: function(data){
                // console.log(data);
                $('#showSong').empty();
                $.each(data, function(k, v){
                  $('#showSong').append('<tr id="songRow"><td>'+ ++count +'</td><td>'+ v['title']+'</td><td>'+ v['description'] +'</td><td>'+ v['genre_name'] +'</td><td>'+ v['album_name'] +'</td><td>'+ v['artist_name'] +'</td><td>'+ v['language_name'] +'</td><td>'+ v['year'] +'</td><td><img src="/songImages/'+ v['image'] +'"></td><td><audio controls><source src="/songs/'+ v['file'] +'" type="audio/mpeg"></audio></td><td><button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $s->id }}" data-bs-toggle="modal" data-bs-target="#editSong"></button><button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $s->id }}"></button></td></tr>');
                });
              }
            });
          });
    
        })
    
    </script>
@endsection()