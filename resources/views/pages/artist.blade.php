@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Manage Artists</h2>

    <div class="container">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addartist">
    Add Artist
  </button>
  
  <table class="table table-bordered mt-3">
    <thead>
        <th>S.No</th>
        <th>Artist Name</th>
        <th>Action</th>
    </thead>
    <tbody id="showArtist">
        @foreach ($artist as $a)
            <tr id="artistRow">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $a->artist_name }}</td>
                <td>
                    <button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $a->id }}" data-bs-toggle="modal" data-bs-target="#editGenre"></button>
                    <button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $a->id }}"></button>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <!-- Add Artist Modal -->
  <div class="modal fade" id="addartist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Artist</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/addartist" method="POST">
              @csrf 
              <div class="form-group">
                <label for="artist_name">Enter Artist Name</label>
                <input type="text" name="artist_name" id="artist_name" class="form-control">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Save changes">
          </div>
      </form>
        </div>
      </div>
    </div>
    </div>


<!-- Edit Artist Modal -->
<div class="modal fade" id="editGenre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Artists</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="edit_artist_id">
            <div class="form-group">
              <label for="edit_artist_name">Edit Artist Name</label>
              <input type="text" name="edit_artist_name" id="edit_artist_name" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="upd_artist">Save changes</button>
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
          url: 'getArtist/'+id,
          type: 'GET',
          success: function(data){
            // console.log(data); 
            $.each(data, function(k, val){
            //   console.log(val['artist_name']); 
              $('#edit_artist_id').val(val['id']);
              $('#edit_artist_name').val(val['artist_name']);
            })
          }
        })
      });

      $('#upd_artist').on('click', function(){
        var id = $('#edit_artist_id').val();
        var name = $('#edit_artist_name').val();
        $.ajax({
          url: 'updArtist/'+id+'/'+name,
          type: 'POST',
          success: function(data){
            // window.open('artist');
            location.reload();
          }
        })
      });

      $('.btnDel').on('click', function(){
        var delId = $(this).val();
        var count = 0;
        // console.log(delId);
        $.ajax({
          url: 'delArtist/'+delId,
          type: 'GET',
          success: function(data){
            // console.log(data);
            $('#showArtist').empty();
            $.each(data, function(k, v){
              $('#showArtist').append('<tr id="artistRow"><td>'+ ++count +'</td><td>'+ v['artist_name'] +'</td><td><button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $a->id }}" data-bs-toggle="modal" data-bs-target="#editGenre"></button><button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $a->id }}"></button></td></tr>');
            });
          }
        });
      });

    })
</script>

@endsection