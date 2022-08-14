@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Manage Video Ratings</h2>

    <div class="container">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVRating">
    Add Video Rating
  </button>
  

  <table class="table table-bordered mt-3">
    <thead>
        <th>S.No</th>
        <th>User Name</th>
        <th>Video Title</th>
        <th>Rating</th>
        <th>Action</th>
    </thead>
    <tbody id="showRating">
        @foreach ($vrating as $v)
            <tr id="ratingRow">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->title }}</td>
                <td>{{ $v->rating }}</td>
                <td>
                    <button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $v->id }}" data-bs-toggle="modal" data-bs-target="#editVRating"></button>
                    <button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $v->id }}"></button>
                    </td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <!-- Add videos Rating Modal -->
  <div class="modal fade" id="addVRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Video Rating</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/addvrating" method="POST">
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
                <label for="vRating">Enter Rating</label>
                <input type="number" name="vRating" id="vRating" class="form-control">
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


    

    <!-- Edit VRating Modal -->
    <div class="modal fade" id="editVRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Video Rating</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="edit_vRating_id">
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
                <label for="edit_vTitle">Select video</label>
                <select name="edit_vTitle" id="edit_vTitle" class="form-control">
                  <option value="" selected disabled>-- Select --</option>
                    @foreach ($videos as $v)
                        <option value="{{ $v->id }}">{{ $v->title }}</option>
                    @endforeach
                </select>
              </div>    
              <div class="form-group">
                <label for="edit_vRating">Enter Rating</label>
                <input type="number" name="edit_vRating" id="edit_vRating" class="form-control">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="upd_vRating">Save changes</button>
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
          url: 'getVRating/'+id,
          type: 'GET',
          success: function(data){
            // console.log(data); 
            $.each(data, function(k, val){
              // console.log(val['name']); 
              $('#edit_vRating_id').val(val['id']);
              $('#edit_vUser').val(val['user_id']);
              $('#edit_vTitle').val(val['video_id']);
              $('#edit_vRating').val(val['rating']);
            })
          }
        })
      });
  
      $('#upd_vRating').on('click', function(){
        var id = $('#edit_vRating_id').val();
        var user = $('#edit_vUser').val();
        var video = $('#edit_vTitle').val();
        var rating = $('#edit_vRating').val();
        $.ajax({
          url: 'updVRating/'+id+'/'+user+'/'+video+'/'+rating,
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
        url: 'delVRating/'+delId,
        type: 'GET',
        success: function(data){
          // console.log(data);
          $('#showRating').empty();
          $.each(data, function(k, v){
            $('#showRating').append('<tr id="ratingRow"><td>'+ ++count +'</td><td>'+ v['name'] +'</td><td>'+ v['title'] +'</td><td>'+ v['rating'] +'</td><td><button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $v->id }}" data-bs-toggle="modal" data-bs-target="#editSRating"></button><button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $v->id }}"></button></td></tr>');
          });
        }
      });
    });
      
    })
</script>
@endsection