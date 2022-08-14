@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Manage Video Reviews</h2>

    <div class="container">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVReview">
    Add Video Review
  </button>
  

  <table class="table table-bordered mt-3">
    <thead>
        <th>S.No</th>
        <th>User Name</th>
        <th>Video Title</th>
        <th>Review</th>
        <th>Action</th>
    </thead>
    <tbody id="showReview">
        @foreach ($vreview as $v)
            <tr id="reviewRow">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->title }}</td>
                <td>{{ $v->review }}</td>
                <td>
                    <button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $v->id }}" data-bs-toggle="modal" data-bs-target="#editVReview"></button>
                    <button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $v->id }}"></button>
                    </td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <!-- Add Songs Review Modal -->
  <div class="modal fade" id="addVReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Video Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/addvreview" method="POST">
              @csrf 
              <div class="form-group">
                <label for="vUser">Select User</label>
                <select name="vUser" id="vUser" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->id }} - {{ $u->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="vTitle">Select Video</label>
                <select name="vTitle" id="vTitle" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($videos as $v)
                        <option value="{{ $v->id }}">{{ $v->title }}</option>
                    @endforeach
                </select>
              </div>    
              <div class="form-group">
                <label for="vReview">Enter Review</label>
                <input type="text" name="vReview" id="vReview" class="form-control">
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


    
<!-- Edit VReview Modal -->
    <div class="modal fade" id="editSReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Video Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="edit_vReview_id">
            <div class="form-group">
                <label for="edit_vUser">Select User</label>
                <select name="edit_vUser" id="edit_vUser" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->id }} - {{ $u->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="edit_vTitle">Select Song</label>
                <select name="edit_vTitle" id="edit_vTitle" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($videos as $v)
                        <option value="{{ $v->id }}">{{ $v->title }}</option>
                    @endforeach
                </select>
              </div>    
              <div class="form-group">
                <label for="edit_vReview">Enter Review</label>
                <input type="text" name="edit_vReview" id="edit_vReview" class="form-control">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="upd_vReview">Save changes</button>
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
          url: 'getVReview/'+id,
          type: 'GET',
          success: function(data){
            // console.log(data); 
            $.each(data, function(k, val){
              // console.log(val['name']); 
              $('#edit_vReview_id').val(val['id']);
              $('#edit_vUser').val(val['user_id']);
              $('#edit_vTitle').val(val['song_id']);
              $('#edit_vReview').val(val['review']);
            })
          }
        })
      });
  
      $('#upd_vReview').on('click', function(){
        var id = $('#edit_vReview_id').val();
        var user = $('#edit_vUser').val();
        var video = $('#edit_vTitle').val();
        var review = $('#edit_vReview').val();
        $.ajax({
          url: 'updVReview/'+id+'/'+user+'/'+video+'/'+review,
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
        url: 'delVReview/'+delId,
        type: 'GET',
        success: function(data){
          // console.log(data);
          $('#showReview').empty();
          $.each(data, function(k, v){
            $('#showReview').append('<tr id="reviewRow"><td>'+ ++count +'</td><td>'+ v['name'] +'</td><td>'+ v['title'] +'</td><td>'+ v['review'] +'</td><td><button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $v->id }}" data-bs-toggle="modal" data-bs-target="#editSReview"></button><button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $v->id }}"></button></td></tr>');
          });
        }
      });
    });
    })
  </script>
@endsection