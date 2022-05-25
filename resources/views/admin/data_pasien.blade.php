@extends('app')
@section('content')
    <div class="page-content">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-title">Data Pasien</h4>
                        <button onclick="TambahPasien()" class="btn btn-primary ms-auto">Tambah Data</button>
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                               
                                <div class="col-sm-12 col-md-6">
                                    <div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-buttons"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%">
                                    <thead>
                                            <tr>
                                                <th >#</th>
                                                <th>Nama pasien</th>
                                                <th >Jenis Kelamin</th>
                                                <th >Email</th>
                                                <th>No Telp</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                           @foreach ($Pasien as $ps)
                                                <tr class="odd">
                                                    <td tabindex="0" class="">{{$no++}}</td>
                                                    <td class="sorting_1">{{$ps->nama_pasien}}</td>
                                                    <td>{{$ps->gender}}</td>
                                                    <td>{{$ps->email}}</td>
                                                    <td>{{$ps->no_telp}}</td>
                                                    <td>{{$ps->alamat}}</td>
                                                    <td>
                                                        <!-- <button onclick="Coba()" type="button" class="btn btn-sm btn-soft-success btn-circle me-2"><i class="dripicons-pencil"></i></button> -->
                                                        <button onclick="UpdatePasien('{{$ps}}')" id="bElim" type="button" class="btn btn-sm btn-soft-success btn-circle" href=""><i class="dripicons-pencil" aria-hidden="true"></i></button>
                                                        <form action="{{route('DataPasien.delete',$ps->id_pasien)}}" method="POST"  style="display: inline-flex">
                                                              @csrf
                                                              @method('DELETE')
                                                              <button id="bElim" type="submit" class="btn btn-sm btn-soft-danger btn-circle"><i class="dripicons-trash" aria-hidden="true"></i></button>
                                                            </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                           
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                         
                        
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>
<script>
    function UpdatePasien(data){
        let datapas = JSON.parse(data)
        $('#id_update').val(datapas.id_pasien)
        $('#gender_update').val(datapas.gender)
        $('#namapas_update').val(datapas.nama_pasien)
        $('#email_update').val(datapas.email)
        $('#no_update').val(datapas.no_telp)
        $('#alamat_update').val(datapas.alamat)



        // let select = document.querySelector('#gender_update');
        // select.value = datapas.gender
        $('#update_pasien').appendTo("body").modal('show');
    }
     function TambahPasien() {
                 $('#tambah_pasien').appendTo("body").modal('show');

             }
</script>
<div class="modal fade" id="tambah_pasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('DataPasien.simpan')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="form-group" >
        <input  placeholder="Nama Pasien" value="{{old('nama_pasien')}}" type="text" name="nama_pasien" class="form-control " required="">
        </div>
         <div class="form-group">
            <select class="form-select" aria-label="Default select example" name="gender">
                <option selected hidden disabled>Open this select menu</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>
         <div class="form-group" >
        <input  placeholder="Email" value="{{old('email')}}" type="text" name="email" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="No Telp" value="{{old('no_telp')}}" type="text" name="no_telp" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Alamat" value="{{old('alamat')}}" type="text" name="alamat" class="form-control " required="">
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
<div class="modal fade" id="update_pasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('DataPasien.update')}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="form-group" >
        <input id="id_update" value="" type="text" name="id_update" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input id="namapas_update" placeholder="Nama Pasien" value="{{old('nama_pasien')}}" type="text" name="nama_pasien" class="form-control " required="">
        </div>
         <div class="form-group">
            <select class="form-select" id="gender_update" aria-label="Default select example" name="gender">
                <option selected hidden disabled>Open this select menu</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>
         <div class="form-group" >
        <input id="email_update" placeholder="Email" value="{{old('email')}}" type="text" name="email" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="no_update" placeholder="No Telp" value="{{old('no_telp')}}" type="text" name="no_telp" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="alamat_update" placeholder="Alamat" value="{{old('alamat')}}" type="text" name="alamat" class="form-control " required="">
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