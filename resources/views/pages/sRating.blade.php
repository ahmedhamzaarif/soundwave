@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Manage Song Ratings</h2>

    <div class="container">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSRating">
    Add Song Rating
  </button>
  

  <table class="table table-bordered mt-3">
    <thead>
        <th>S.No</th>
        <th>User Name</th>
        <th>Song Title</th>
        <th>Rating</th>
        <th>Action</th>
    </thead>
    <tbody id="showRating">
        @foreach ($srating as $sr)
            <tr id="ratingRow">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sr->name }}</td>
                <td>{{ $sr->title }}</td>
                <td>{{ $sr->rating }}</td>
                <td>
                    <button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $sr->id }}" data-bs-toggle="modal" data-bs-target="#editSRating"></button>
                    <button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $sr->id }}"></button>
                    </td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <!-- Add Songs Rating Modal -->
  <div class="modal fade" id="addSRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Song Rating</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/addsrating" method="POST">
              @csrf 
              <div class="form-group">
                <label for="sUser">Select User</label>
                <select name="sUser" id="sUser" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->id }} - {{ $u->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="sTitle">Select Song</label>
                <select name="sTitle" id="sTitle" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($songs as $s)
                        <option value="{{ $s->id }}">{{ $s->title }}</option>
                    @endforeach
                </select>
              </div>    
              <div class="form-group">
                <label for="sRating">Enter Rating</label>
                <input type="number" name="sRating" id="sRating" class="form-control" minlength="1" maxlength="1">
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


    

    <!-- Edit sRating Modal -->
    <div class="modal fade" id="editSRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Song Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="edit_sRating_id">
            <div class="form-group">
                <label for="edit_sUser">Select User</label>
                <select name="edit_sUser" id="edit_sUser" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->id }} - {{ $u->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="edit_sTitle">Select Song</label>
                <select name="edit_sTitle" id="edit_sTitle" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($songs as $s)
                        <option value="{{ $s->id }}">{{ $s->title }}</option>
                    @endforeach
                </select>
              </div>    
              <div class="form-group">
                <label for="edit_sRating">Edit Rating</label>
                <input type="number" name="edit_sRating" id="edit_sRating" class="form-control" minlength="1" maxlength="1">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="upd_rating">Save changes</button>
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
        url: 'getSRating/'+id,
        type: 'GET',
        success: function(data){
          // console.log(data); 
          $.each(data, function(k, val){
            // console.log(val['name']); 
            $('#edit_sRating_id').val(val['id']);
            $('#edit_sUser').val(val['user_id']);
            $('#edit_sTitle').val(val['song_id']);
            $('#edit_sRating').val(val['rating']);
          })
        }
      })
    });

    $('#upd_rating').on('click', function(){
      var id = $('#edit_sRating_id').val();
      var user = $('#edit_sUser').val();
      var song = $('#edit_sTitle').val();
      var rating = $('#edit_sRating').val();
      $.ajax({
        url: 'updSRating/'+id+'/'+user+'/'+song+'/'+rating,
        type: 'POST',
        success: function(data){
          // window.open('users');
          location.reload();
        }
      })
    });

    $('.btnDel').on('click', function(){
      var delId = $(this).val();
      var count = 0;
      // console.log(delId);
      $.ajax({
        url: 'delSRating/'+delId,
        type: 'GET',
        success: function(data){
          // console.log(data);
          $('#showRating').empty();
          $.each(data, function(k, v){
            $('#showRating').append('<tr id="ratingRow"><td>'+ ++count +'</td><td>'+ v['name'] +'</td><td>'+ v['title'] +'</td><td>'+ v['rating'] +'</td><td><button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $sr->id }}" data-bs-toggle="modal" data-bs-target="#editSRating"></button><button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $sr->id }}"></button></td></tr>');
          });
        }
      });
    });
  })
</script>

@endsection