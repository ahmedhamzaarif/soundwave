@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Manage Albums</h2>

    <div class="container">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAlbum">
    Add Album
  </button>
  
  <div class="container">
    <table class="table table-bordered mt-3">
        <thead>
            <th>S.No</th>
            <th>Category Name</th>
            <th>Actions</th>
        </thead>
        <tbody id="showAlbum">
            @foreach ($album as $a)
                <tr id="albumRow">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->album_name }}</td>
                    <td>
                        <button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $a->id }}" data-bs-toggle="modal" data-bs-target="#editAlbum"></button>
	    				<button value="{{ $a->id }}" class="bi bi-trash btn btn-sm btn-danger btnDel"> </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>

  <!-- Add Album Modal -->
  <div class="modal fade" id="addAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Album</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/addalbum" method="POST">
              @csrf 
              <div class="form-group">
                <label for="album_name">Enter Album Name</label>
                <input type="text" name="album_name" id="album_name" class="form-control">
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


    <!-- Edit Album Modal -->
    <div class="modal fade" id="editAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Album</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit_album_id">
                <div class="form-group">
                  <label for="edit_album_name">Edit Album Name</label>
                  <input type="text" name="edit_album_name" id="edit_album_name" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="upd_album">Save changes</button>
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
            url: 'getAlbum/'+id,
            type: 'GET',
            success: function(data){
              // console.log(data); 
              $.each(data, function(k, val){
                // console.log(val['album_name']); 
                $('#edit_album_id').val(val['id']);
                $('#edit_album_name').val(val['album_name']);
              })
            }
          })
        });

        $('#upd_album').on('click', function(){
          var id = $('#edit_album_id').val();
          var name = $('#edit_album_name').val();
          $.ajax({
            url: 'updAlbum/'+id+'/'+name,
            type: 'POST',
            success: function(data){
              // window.open('album');
              location.reload();
            }
          })
        });

        $('.btnDel').on('click', function(){
        var delId = $(this).val();
        var count = 0;
        // console.log(delId);
        $.ajax({
          url: 'delAlbum/'+delId,
          type: 'GET',
          success: function(data){
            // console.log(data);
            $('#showAlbum').empty();
            $.each(data, function(k, v){
              $('#showAlbum').append('<tr id="albumRow"><td>'+ ++count +'</td><td>'+ v['album_name'] +'</td><td><button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $a->id }}" data-bs-toggle="modal" data-bs-target="#editAlbum"></button><button value="{{ $a->id }}" class="bi bi-trash btn btn-sm btn-danger btnDel"> </button></td></tr>');
            });
          }
        });
      });
    })
</script>

@endsection