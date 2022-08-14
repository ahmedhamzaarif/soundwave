@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Manage Song Reviews</h2>

    <div class="container">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSReview">
    Add Song Review
  </button>
  

  <table class="table table-bordered mt-3">
    <thead>
        <th>S.No</th>
        <th>User Name</th>
        <th>Song Title</th>
        <th>Review</th>
        <th>Action</th>
    </thead>
    <tbody id="showReview">
        @foreach ($sreview as $sr)
            <tr id="reviewRow">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sr->name }}</td>
                <td>{{ $sr->title }}</td>
                <td>{{ $sr->review }}</td>
                <td>
                    <button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $sr->id }}" data-bs-toggle="modal" data-bs-target="#editSReview"></button>
                    <button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $sr->id }}"></button>
                    </td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <!-- Add Songs Review Modal -->
  <div class="modal fade" id="addSReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Song Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/addsreview" method="POST">
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
                <label for="sReview">Enter Review</label>
                <input type="text" name="sReview" id="sReview" class="form-control">
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


    
<!-- Edit sReview Modal -->
    <div class="modal fade" id="editSReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Song Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="edit_sReview_id">
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
                <label for="edit_sReview">Enter Review</label>
                <input type="text" name="edit_sReview" id="edit_sReview" class="form-control">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="upd_sReview">Save changes</button>
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
          url: 'getSReview/'+id,
          type: 'GET',
          success: function(data){
            // console.log(data); 
            $.each(data, function(k, val){
              // console.log(val['name']); 
              $('#edit_sReview_id').val(val['id']);
              $('#edit_sUser').val(val['user_id']);
              $('#edit_sTitle').val(val['song_id']);
              $('#edit_sReview').val(val['review']);
            })
          }
        })
      });
  
      $('#upd_sReview').on('click', function(){
        var id = $('#edit_sReview_id').val();
        var user = $('#edit_sUser').val();
        var song = $('#edit_sTitle').val();
        var review = $('#edit_sReview').val();
        $.ajax({
          url: 'updSReview/'+id+'/'+user+'/'+song+'/'+review,
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
        url: 'delSReview/'+delId,
        type: 'GET',
        success: function(data){
          // console.log(data);
          $('#showReview').empty();
          $.each(data, function(k, v){
            $('#showReview').append('<tr id="reviewRow"><td>'+ ++count +'</td><td>'+ v['name'] +'</td><td>'+ v['title'] +'</td><td>'+ v['review'] +'</td><td><button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $sr->id }}" data-bs-toggle="modal" data-bs-target="#editSReview"></button><button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $sr->id }}"></button></td></tr>');
          });
        }
      });
    });
    })
  </script>

@endsection