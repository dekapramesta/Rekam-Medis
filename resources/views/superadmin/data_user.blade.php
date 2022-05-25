@extends('app')
@section('content')
    <div class="page-content">
    <div class="container-fluid">
      <div class="row">
            <div class="col-12">
              <div class="card">
                 @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{$err}}</p>
                        @endforeach
                        @endif
                <div class="card-header d-flex">
                  <h4 class="card-title">Datav User</h4>
                  <button onclick="TambahUser()" class="btn btn-primary ms-auto">Tambah Data</button>
                </div>
                <!--end card-header-->
                <div class="card-body">
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Status User</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                           @foreach ($user as $us)
                           <tr>
                            <td>{{$no++}}</td>
                           <td>{{$us->username}}</td>
                           <td>@if ($us->level == 1)
                               {{ "Admin" }}
                              
                                   
                               @else
                                   
                            {{ "Superadmin" }}

                               
                           @endif</td>
                           <td>@if ($us->status_user == 1)
                               {{ "Aktif" }}
                           @else
                             {{ "Non Aktif" }}
                           @endif</td>
                           <td>
                          <Button onclick="UpdateUs('{{$us}}')"id="bElim" type="button" class="btn btn-sm btn-soft-success btn-circle" href=""><i class="dripicons-pencil" aria-hidden="true"></i></Button>
                            <Button onclick="ChangePass('{{$us->id}}')"id="bElim" type="button" class="btn btn-sm btn-soft-primary btn-circle" href=""><i class="dripicons-lock-open" aria-hidden="true"></i></Button>

                        </td>
                           </tr>
                           @endforeach

                          
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- end col -->
          </div> <!-- end row -->
    </div>
</div>
<script>
  function UpdateUs(data){
        let us = JSON.parse(data)
        console.log(us)
        $('#update_id').val(us.id)
        $('#update_username').val(us.username)
        $('#update_level').val(us.level)
        $('#update_status').val(us.status_user)
        $('#update_user').appendTo("body").modal('show');

    }
    function TambahUser(){
        $('#tambah_user').appendTo("body").modal('show');

    }
    function ChangePass(id){
        $('#pass_id').val(id)
        $('#ganti_pass').appendTo("body").modal('show');

    }
 
</script>
<div class="modal fade" id="ganti_pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('superadmin.ganti')}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
         <div class="form-group" >
        <input id="pass_id"  value="{{old('id')}}" type="text" name="id" class="form-control " required="">
        <input  placeholder="Password" value="{{old('password')}}" type="password" name="password" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input placeholder="Confirmasi Password" value="{{old('conf_pass')}}" type="passowrd" name="conf_pass" class="form-control " required="">
        </div>

         
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="update_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('superadmin.update')}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
         <div class="form-group" >
        <input id="update_id" placeholder="Keluhan" value="{{old('id')}}" type="text" name="id" class="form-control " required="">
        <input id="update_username" placeholder="Keluhan" value="{{old('username')}}" type="text" name="username" class="form-control " required="">
        </div>
         <div class="form-group" >
        <select class="select form-control mb-3 " id="update_level" name="level">
          <option value="1">Admin</option>
          <option value="2">Super Admin</option>
        </select>
        </div>
         <div class="form-group" >
        <select class="select form-control mb-3 " id="update_status" name="status_user">
          <option value="1">Aktif</option>
          <option value="0">Non-Aktif</option>
        </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('superadmin.daftar')}}" method="post">
        @csrf
      <div class="modal-body">
         <div class="form-group" >
        <input placeholder="Username" value="{{old('username')}}" type="text" name="username" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input  placeholder="Password" value="{{old('username')}}" type="password" name="password" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input  placeholder="Confirmasi Password" value="{{old('username')}}" type="password" name="conf_pass" class="form-control " required="">
        </div>
         <div class="form-group" >
        <select class="select form-control mb-3 " name="level">
            <option disabled selected hidden>Pilih Akses</option>
          <option value="1">Admin</option>
          <option value="2">Super Admin</option>
        </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection