@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Manage Languages</h2>

    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLang">
            Add Language
        </button>
  
    <table class="table table-bordered mt-3">
        <thead>
            <th>S.No</th>
            <th>Category Name</th>
            <th>Actions</th>
        </thead>
        <tbody id="showLang">
            @foreach ($lang as $l)
                <tr id="langRow">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $l->language_name }}</td>
                    <td>
                        <button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $l->id }}" data-bs-toggle="modal" data-bs-target="#editLang"></button>
	    				<button value="{{ $l->id }}" class="bi bi-trash btn btn-sm btn-danger btnDel"> </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

  <!-- Add Language Modal -->
    <div class="modal fade" id="addLang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Language</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/addlang" method="POST">
                @csrf 
                <div class="form-group">
                  <label for="lang_name">Enter Language Name</label>
                  <input type="text" name="lang_name" id="lang_name" class="form-control">
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

    <!-- Edit Language Modal -->
    <div class="modal fade" id="editLang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Language</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit_lang_id">
                <div class="form-group">
                  <label for="edit_lang_name">Edit Language Name</label>
                  <input type="text" name="edit_lang_name" id="edit_lang_name" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="upd_lang">Save changes</button>
            </div>
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
          url: 'getLang/'+id,
          type: 'GET',
          success: function(data){
            // console.log(data); 
            $.each(data, function(k, val){
              // console.log(val['language_name']); 
              $('#edit_lang_id').val(val['id']);
              $('#edit_lang_name').val(val['language_name']);
            })
          }
        })
      });

      $('#upd_lang').on('click', function(){
        var id = $('#edit_lang_id').val();
        var name = $('#edit_lang_name').val();
        $.ajax({
          url: 'updLang/'+id+'/'+name,
          type: 'POST',
          success: function(data){
            // window.open('language');
            location.reload();
          }
        })
      });

      $('.btnDel').on('click', function(){
        var delId = $(this).val();
        var count = 0;
        // console.log(delId);
        $.ajax({
          url: 'delLang/'+delId,
          type: 'GET',
          success: function(data){
            // console.log(data);
            $('#showLang').empty();
            $.each(data, function(k, v){
              $('#showLang').append('<tr id="langRow"><td>'+ ++count +'</td><td>'+ v['language_name'] +'</td><td><button class="bi bi-pencil-square btn btn-sm btn-info btnEdit" value="{{ $l->id }}" data-bs-toggle="modal" data-bs-target="#editLang"></button><button value="{{ $l->id }}" class="bi bi-trash btn btn-sm btn-danger btnDel"> </button></td></tr>');
            });
          }
        });
      });
    })
</script>

@endsection