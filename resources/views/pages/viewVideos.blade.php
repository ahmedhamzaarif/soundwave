@extends('layouts.applayout')

@section('content')

    <h2 class="text-center">View Videos</h2>

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
                <th>Url / Link</th>
                <th>Action</th>
            </thead>
            <tbody id="showVid">
                @foreach ($videos as $v)
                    <tr id="vidRow">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $v->title }}</td>
                        <td>{{ $v->description }}</td>
                        <td>{{ $v->genre_name }}</td>
                        <td>{{ $v->album_name }}</td>
                        <td>{{ $v->artist_name }}</td>
                        <td>{{ $v->language_name }}</td>
                        <td>{{ $v->year }}</td>
                        <td><img src="/videoImages/{{$v->image}}"></td> 
                        <td><a href="{{ $v->file }}" target="_blank" class="mdi mdi-link-variant" style="font-size:1.5rem;"></a></td>
                        <td>
                            <button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $v->id }}" data-bs-toggle="modal" data-bs-target="#editVid"></button>
                            <button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $v->id }}"></button>
                        </td>
                    </tr>                
                @endforeach
            </tbody>
        </table>
    </div>

        
<!-- Edit Video Modal -->
<div class="modal fade" id="editVid" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Video Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="edit_video_id">
          <div class="form-group">
            <label for="edit_video_title">Enter Title</label>
            <input type="text" name="edit_video_title" id="edit_video_title" class="form-control">
          </div>
          <div class="form-group">
            <label for="edit_video_desc">Enter Description</label>
            <input type="text" name="edit_video_desc" id="edit_video_desc" class="form-control">
          </div>
          
          <div class="form-group">
              <label for="edit_video_link">Enter Video Url / Link</label>
              <input type="url" name="edit_video_link" id="edit_video_link" class="form-control">
          </div>
          <div class="form-group">
            <label for="edit_video_genre">Select Genre</label>
            <select name="edit_video_genre" id="edit_video_genre" class="form-control">
                <option value="" selected disabled>-- Select --</option>
                @foreach ($genre as $g)
                    <option value="{{ $g->id }}">{{ $g->genre_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="edit_video_artist">Select Artist</label>
            <select name="edit_video_artist" id="edit_video_artist" class="form-control">
              <option value="" selected disabled>-- Select --</option>
                @foreach ($artist as $art)
                    <option value="{{ $art->id }}">{{ $art->artist_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="edit_video_album">Select Album</label>
            <select name="edit_video_album" id="edit_video_album" class="form-control">
              <option value="" selected disabled>-- Select --</option>
                @foreach ($album as $al)
                    <option value="{{ $al->id }}">{{ $al->album_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="edit_video_lang">Select Language</label>
            <select name="edit_video_lang" id="edit_video_lang" class="form-control">
              <option value="" selected disabled>-- Select --</option>
                @foreach ($lang as $l)
                    <option value="{{ $l->id }}">{{ $l->language_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="edit_video_year">Enter Year</label>
            <input type="number" name="edit_video_year" id="edit_video_year" class="form-control" maxlength="4">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="upd_vid">Save changes</button>
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
        url: 'getVid/'+id,
        type: 'GET',
        success: function(data){
          // console.log(data); 
          $.each(data, function(k, val){
            console.log(val['genre_name']); 
            $('#edit_video_id').val(val['id']);
            $('#edit_video_title').val(val['title']);
            $('#edit_video_desc').val(val['description']);
            $('#edit_video_genre').val(val['genre_id']);
            $('#edit_video_artist').val(val['artist_id']);
            $('#edit_video_album').val(val['album_id']);
            $('#edit_video_lang').val(val['lang_id']);
            $('#edit_video_year').val(val['year']);
            $('#edit_video_link').val(val['file']);
          })
        }
      })
    });

  $('#upd_vid').on('click', function(){
      var id = $('#edit_video_id').val();
      var name = $('#edit_video_title').val();
      var desc = $('#edit_video_desc').val();
      var genre = $('#edit_video_genre').val();
      var artist = $('#edit_video_artist').val();
      var album = $('#edit_video_album').val();
      var lang = $('#edit_video_lang').val();
      var year = $('#edit_video_year').val();
      var url = $('#edit_video_link').val();

      $.ajax({
        url: 'updVid/'+id+'/'+name+'/'+desc+'/'+genre+'/'+artist+'/'+album+'/'+lang+'/'+year+'/'+url,
        type: 'POST',
        success: function(data){
          location.reload();
        }
      })
    });

    $('.btnDel').on('click', function(){
      var delId = $(this).val();
      var count = 0;
      // console.log(delId);
      $.ajax({
        url: 'delVid/'+delId,
        type: 'GET',
        success: function(data){
          // console.log(data);
          $('#showVid').empty();
          $.each(data, function(k, v){
            $('#showVid').append('<tr id="vidRow"><td>'+ ++count +'</td><td>'+ v['title'] +'</td><td>'+ v['description'] +'</td><td>'+ v['genre_name'] +'</td><td>'+ v['album_name'] +'</td><td>'+ v['artist_name'] +'</td><td>'+ v['language_name'] +'</td><td>'+ v['year'] +'</td><td><img src="/videoImages/'+ v['image'] +'"></td> <td><a href="'+ v['file'] +'" target="_blank" class="mdi mdi-link-variant" style="font-size:1.5rem;"></a></td><td><button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $v->id }}" data-bs-toggle="modal" data-bs-target="#editVid"></button><button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $v->id }}"></button></td></tr>');
          });
        }
      });
    });

  })

</script>
@endsection()