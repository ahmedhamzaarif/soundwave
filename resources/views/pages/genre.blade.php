@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Manage Genres</h2>

    <div class="container">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGenre">
    Add Genre
  </button>
  

  <table class="table table-bordered mt-3">
    <thead>
        <th>S.No</th>
        <th>Genre Name</th>
        <th>Action</th>
    </thead>
    <tbody id="showGenre">
        @foreach ($genre as $g)
            <tr id="genreRow">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $g->genre_name }}</td>
                <td>
                  <button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $g->id }}" data-bs-toggle="modal" data-bs-target="#editGenre"></button>
                  <button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $g->id }}"></button>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <!-- Add Genre Modal -->
  <div class="modal fade" id="addGenre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Genre</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/addgenre" method="POST">
              @csrf 
              <div class="form-group">
                <label for="genre_name">Enter Genre Name</label>
                <input type="text" name="genre_name" id="genre_name" class="form-control">
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


    
<!-- Edit Genre Modal -->
    <div class="modal fade" id="editGenre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Genre</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="edit_genre_id">
            <div class="form-group">
              <label for="edit_genre_name">Edit Genre Name</label>
              <input type="text" name="edit_genre_name" id="edit_genre_name" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="upd_genre">Save changes</button>
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
          url: 'getGenre/'+id,
          type: 'GET',
          success: function(data){
            // console.log(data); 
            $.each(data, function(k, val){
              console.log(val['genre_name']); 
              $('#edit_genre_id').val(val['id']);
              $('#edit_genre_name').val(val['genre_name']);
            })
          }
        })
      });

    $('#upd_genre').on('click', function(){
        var id = $('#edit_genre_id').val();
        var name = $('#edit_genre_name').val();
        $.ajax({
          url: 'updGenre/'+id+'/'+name,
          type: 'POST',
          success: function(data){
            // window.open('genre');
            location.reload();
          }
        })
      });

      $('.btnDel').on('click', function(){
        var delId = $(this).val();
        var count = 0;
        // console.log(delId);
        $.ajax({
          url: 'delGenre/'+delId,
          type: 'GET',
          success: function(data){
            // console.log(data);
            $('#showGenre').empty();
            $.each(data, function(k, v){
              $('#showGenre').append('<tr id="genreRow"><td>'+ ++count +'</td><td>'+ v['genre_name'] +'</td><td><button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $g->id }}" data-bs-toggle="modal" data-bs-target="#editGenre"></button><button class="bi bi-trash btn btn-sm btn-danger btnDel" value="{{ $g->id }}"></button></td></tr>');
            });
          }
        });
      });

    })

</script>
@endsection