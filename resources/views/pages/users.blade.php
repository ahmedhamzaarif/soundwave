@extends('layouts.applayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <h2 class="text-center">Manage Users</h2>

    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
            Add User
        </button>
  
        <table class="table table-bordered mt-3">
            <thead>
                <th>S.No</th>
                <th>User Name</th>
                <th>Phone No.</th>
                <th>Address</th>
                <th>Email</th>
                <th>Actions</th>
            </thead>
            <tbody id="showUser">
                @foreach ($users as $u)
                    <tr id="userRow">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->phone }}</td>
                        <td>{{ $u->address }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <button value="{{ $u->id }}" class="bi bi-pencil-square btn btn-sm btn-info btnEdit" data-bs-toggle="modal" data-bs-target="#editUser"> </button>
                            <button value="{{ $u->id }}" class="bi bi-trash btn btn-sm btn-danger btnDel"> </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add User Modal -->
        <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/adduser" method="POST">
                    @csrf 
                    <div class="form-group">
                      <label for="user_name">Enter User Name</label>
                      <input type="text" name="user_name" id="user_name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="user_phone">Enter Phone No.</label>
                      <input type="number" name="user_phone" id="user_phone" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="user_address">Enter Address</label>
                      <input type="text" name="user_address" id="user_address" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="user_email">Enter Email</label>
                      <input type="email" name="user_email" id="user_email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="user_pass">Enter Password</label>
                      <input type="password" name="user_pass" id="user_pass" class="form-control">
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

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_user_id">
                    <div class="form-group">
                      <label for="edit_user_name">Edit User Name</label>
                      <input type="text" name="edit_user_name" id="edit_user_name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="edit_user_phone">Edit Phone No.</label>
                      <input type="number" name="edit_user_phone" id="edit_user_phone" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="edit_user_address">Edit Address</label>
                      <input type="text" name="edit_user_address" id="edit_user_address" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="edit_user_email">Edit Email</label>
                      <input type="email" name="edit_user_email" id="edit_user_email" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" id="upd_user" value="Save changes">
                </div>
            </form>
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
          url: 'getUser/'+id,
          type: 'GET',
          success: function(data){
            // console.log(data); 
            $.each(data, function(k, val){
              // console.log(val['name']); 
              $('#edit_user_id').val(val['id']);
              $('#edit_user_name').val(val['name']);
              $('#edit_user_phone').val(val['phone']);
              $('#edit_user_address').val(val['address']);
              $('#edit_user_email').val(val['email']);
            })
          }
        })
      });

      $('#upd_user').on('click', function(){
        var id = $('#edit_user_id').val();
        var name = $('#edit_user_name').val();
        var phone = $('#edit_user_phone').val();
        var address = $('#edit_user_address').val();
        var email = $('#edit_user_email').val();
        $.ajax({
          url: 'updUser/'+id+'/'+name+'/'+phone+'/'+address+'/'+email,
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
          url: 'delUser/'+delId,
          type: 'GET',
          success: function(data){
            // console.log(data);
            $('#showUser').empty();
            $.each(data, function(k, v){
              $('#showUser').append('<tr id="userRow"><td>'+ ++count +'</td><td>'+ v['name'] +'</td><td>'+ v['phone'] +'</td><td>'+ v['address'] +'</td><td>'+ v['email'] +'</td><td><button value="{{ $u->id }}" class="bi bi-pencil-square btn btn-sm btn-info btnEdit" data-bs-toggle="modal" data-bs-target="#editUser"> </button><button value="{{ $u->id }}" class="bi bi-trash btn btn-sm btn-danger btnDel"> </button></td></tr>');
            });
          }
        });
      });
    })
</script>

@endsection