

@extends('app')
@section('content')
      
<div class="page-content" style="background-color: #FDEFE0">
    <div class="container-fluid">
        <div class="row  justify-content-center">
            <div class="col-8 mt-5">
                <div class="card">
                      @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{$err}}</p>
                        @endforeach
                        @endif
                    <div class="card-header d-flex">
                        <h4 class="card-title">Profile </h4>
                        
                        <!-- <button onclick="TambahPasien()" class="btn btn-primary ms-auto">Tambah Data</button> -->
                    </div>
                    <!--end card-header-->
                   
                        <div class="card-body ">

                            <div class="form-group" >
                                @php
                                    $foto = $data->foto;
                                @endphp
                                <img src="@if ($foto == null)
                                    https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png
                                @else
                                    {{asset('/storage/fotoprofil/'.$data->foto)}}
                                @endif" style="width: 300px" class="rounded mx-auto d-block"  alt="...">
                            </div>

                            <div class="section-title">Username</div>
                            <div class="form-group">
                                <input readonly value="{{$data->username}}" class="form-control"  type="text">
                            </div>
                             
                             <div class="section-title">Hak Akses</div>
                            <div class="form-group">
                                <input readonly value="@php
                                    if ($data->level == 1){
                                        echo "admin";
                                    }
                               elseif($data->level == 2){
                                   echo "Superadmin";
                               }

                               elseif($data->level == 3){
                                   echo "Dokter";
                               }

                                @endphp"  class="form-control"  type="text">
                            </div>
                            @if (Auth::user()->level == 3)
                             <div class="section-title">Nama Lengkap</div>
                            <div class="form-group">
                                <input readonly value="{{$data->getUser->nama_dokter}}" class="form-control"  type="text">
                            </div>
                             <div class="section-title">Spesialis</div>
                            <div class="form-group">
                                <input readonly value="{{$data->getUser->spesialis}}" class="form-control"  type="text">
                            </div>
                                                         <div class="section-title">No Telp</div>

                             <div class="form-group">
                                <input readonly value="{{$data->getUser->no_telp}}" class="form-control"  type="text">
                            </div>
                                                         <div class="section-title">Alamat</div>

                             <div class="form-group">
                                <input readonly value="{{$data->getUser->alamat}}" class="form-control"  type="text">
                            </div>
                                
                            @endif
                            
                            <div class="col d-flex justify-content-center ">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#update_profile" class="btn btn-primary ms-2 ">Ubah Data</button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ms-2 ">Ubah Foto</button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#ganti_pass" class="btn btn-primary ms-2 ">Ubah Password</button>
                            </div>
                           


                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="{{route('profile.foto')}}" method="post" enctype="multipart/form-data">
                @csrf
 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Foto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <div class="mb-3">
  <label for="formFile" class="form-label">Pilih Foto</label>
  <input class="form-control" type="file" name="foto" id="formFile">
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
<div class="modal fade" id="update_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('profile.ubahdata')}}"  method="post">
        @csrf
      <div class="modal-body">
         <div class="form-group" >
        <input id="id_dokter"  placeholder="Username" value="{{$data->username}}" type="text" name="username" class="form-control " required="">
        </div>
        @if (Auth::user()->level == 3)
           <div class="form-group" >
        <input id="nama_dokter" placeholder="Nama Dokter" value="{{$data->getUser->nama_dokter}}" type="text" name="nama_dokter" class="form-control " required="">
        </div>
         <select id="id_poli" class="select form-control mb-3 " name="id_poli">
          <option disabled selected>Pilih Poli</option>
            @foreach ($poli as $pk)
                <option @if ($pk->id == $data->getUser->id_poli)
                    selected
                @endif value="{{$pk->id}}">{{$pk->nama_poliklinik}}</option>
            @endforeach
        </select>
         <div class="form-group" >
        <input id="spesialis" placeholder="spesialis" value="{{$data->getUser->spesialis}}" type="text" name="spesialis" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="no_telp" placeholder="No Telp" value="{{$data->getUser->no_telp}}" type="text" name="no_telp" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="alamat" placeholder="Alamat" value="{{$data->getUser->alamat}}" type="text" name="alamat" class="form-control " required="">
        </div>
 
        @endif
              </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="ganti_pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('profile.ubahpass')}}"  method="post">
        @csrf
      <div class="modal-body">
         <div class="form-group" >
        <input  placeholder="Password" type="password" name="password" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input  placeholder="Confirmasi Password" type="password" name="conf_pass" class="form-control " required="">
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

      <!-- Page Content-->
    
