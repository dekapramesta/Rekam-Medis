@extends('app')
@section('content')
    <div class="page-content" style="background-color: #FDEFE0">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-title">Data Dokter</h4>
                        {{-- <button onclick="TambahDokter()" class="btn btn-primary ms-auto">Tambah Data</button> --}}
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                      @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{$err}}</p>
                        @endforeach
                        @endif

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
                                                <th >No</th>
                                                <th>Nama Dokter</th>
                                                <th >PoliKlinik</th>
                                                <th >Spesialis</th>
                                                <th >No Telp</th>
                                                <th >Alamat</th>
                                                <th >Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $no = 1; ?>
                                           @foreach ($dokter as $dk)
                                                <tr class="odd">
                                                    <td tabindex="0" class="">{{$no++}}</td>
                                                    <td class="sorting_1">{{$dk->nama_dokter}}</td>
                                                    <td>{{$dk->getPoli->nama_poliklinik}}</td>
                                                    <td>{{$dk->spesialis}}</td>
                                                    <td>{{$dk->no_telp}}</td>
                                                    <td>{{$dk->alamat}}</td>
                                                    <td>
                                                        <!-- <button onclick="Coba()" type="button" class="btn btn-sm btn-soft-success btn-circle me-2"><i class="dripicons-pencil"></i></button> -->
                                                        <button onclick="UpdateDokter('{{$dk}}')" id="bElim" type="button" class="btn btn-sm btn-soft-success btn-circle" href=""><i class="dripicons-pencil" aria-hidden="true"></i></button>
                                                         <form action="{{route('Dokter.deletecok',$dk->id)}}" method="POST"  style="display: inline-flex">
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
    function UpdateDokter(data){
        let datadok = JSON.parse(data)
        console.log(datadok);
        $('#id_dokter').val(datadok.id)
        $('#nama_dokter').val(datadok.nama_dokter)
                $('#id_poli').val(datadok.id_poli)

        $('#spesialis').val(datadok.spesialis)
        $('#no_telp').val(datadok.no_telp)
        $('#alamat').val(datadok.alamat)



        // let select = document.querySelector('#gender_update');
        // select.value = datapas.gender
        $('#update_dokter').appendTo("body").modal('show');
    }
     function TambahDokter() {
                 $('#tambah_dokter').appendTo("body").modal('show');

             }
</script>
<div class="modal fade" id="tambah_dokter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('DataDokter.store')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="form-group" >
        <input  placeholder="Nama Dokter" value="{{old('nama_dokter')}}" type="text" name="nama_dokter" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Spesilis" value="{{old('spesialis')}}" type="text" name="spesialis" class="form-control " required="">
        </div>
          <select class="select form-control mb-3 " name="id_poli">
          <option disabled selected>Pilih Poli</option>
            @foreach ($poli as $pk)
                <option value="{{$pk->id}}">{{$pk->nama_poliklinik}}</option>
            @endforeach
        </select>
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
<div class="modal fade" id="update_dokter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Dan Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('Dokter.updatedokter')}}"  method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
         <div class="form-group" >
        <input id="id_dokter" hidden placeholder="Nama Dokter" value="{{old('nama_dokter')}}" type="text" name="id_dokter" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input id="nama_dokter" placeholder="Nama Dokter" value="{{old('nama_dokter')}}" type="text" name="nama_dokter" class="form-control " required="">
        </div>
         <select id="id_poli" class="select form-control mb-3 " name="id_poli">
          <option disabled selected>Pilih Poli</option>
            @foreach ($poli as $pk)
                <option value="{{$pk->id}}">{{$pk->nama_poliklinik}}</option>
            @endforeach
        </select>
         <div class="form-group" >
        <input id="spesialis" placeholder="spesialis" value="{{old('spesialis')}}" type="text" name="spesialis" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="no_telp" placeholder="No Telp" value="{{old('no_telp')}}" type="text" name="no_telp" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="alamat" placeholder="Alamat" value="{{old('alamat')}}" type="text" name="alamat" class="form-control " required="">
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