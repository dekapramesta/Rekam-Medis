@extends('app')
@section('content')
    <div class="page-content">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-title">Data Pasien</h4>
                        <button onclick="TambahObat()" class="btn btn-primary ms-auto">Tambah Data</button>
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
                                                <th>#</th>
                                                <th>Nama Obat</th>
                                                <th>Harga</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $no = 1; ?>
                                           @foreach ($obat as $ot)
                                                <tr class="odd">
                                                    <td tabindex="0" class="">{{$no++}}</td>
                                                    <td class="sorting_1">{{$ot->nama_obat}}</td>
                                                    <td>{{$ot->harga}}</td>
                                                    <td>{{$ot->keterangan}}</td>
                                                    <td>
                                                        <!-- <button onclick="Coba()" type="button" class="btn btn-sm btn-soft-success btn-circle me-2"><i class="dripicons-pencil"></i></button> -->
                                                        <button onclick="UpdateObat('{{$ot}}')" id="bElim" type="button" class="btn btn-sm btn-soft-success btn-circle" href=""><i class="dripicons-pencil" aria-hidden="true"></i></button>
                                                          <form action="{{route('DataObat.destroy',$ot->id)}}" method="POST"  style="display: inline-flex">
                                                              @csrf
                                                              @method('DELETE')
                                                        <button id="bElim" type="submit" class="btn btn-sm btn-soft-danger btn-circle"><i class="dripicons-trash" aria-hidden="true"></i></button>
                                                            </form>
                                                        {{-- <a id="bElim" type="button" class="btn btn-sm btn-soft-danger btn-circle" href="{{ route('DataDokter.edit', $dk->id) }}"><i class="dripicons-trash" aria-hidden="true"></i></a> --}}
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
    function UpdateObat(data){
        let obat = JSON.parse(data)
        console.log(obat);
        $('#id_obat').val(obat.id)
        $('#nama_obat').val(obat.nama_obat)
        $('#harga').val(obat.harga)
        $('#keterangan').val(obat.keterangan)



        // let select = document.querySelector('#gender_update');
        // select.value = datapas.gender
        $('#update_obat').appendTo("body").modal('show');
    }
     function TambahObat() {
                 $('#tambah_obat').appendTo("body").modal('show');

             }
</script>
<div class="modal fade" id="tambah_obat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('DataObat.store')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="form-group" >
        <input  placeholder="Nama Dokter" value="{{old('nama_obat')}}" type="text" name="nama_obat" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Email" value="{{old('harga')}}" type="text" name="harga" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="No Telp" value="{{old('keterangan')}}" type="text" name="keterangan" class="form-control " required="">
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
<div class="modal fade" id="update_obat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('Obat.updateObat')}}"  method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
         <div class="form-group" >
        <input id="id_obat" placeholder="Nama Dokter" value="{{old('id')}}" type="text" name="id" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input id="nama_obat" placeholder="Nama Dokter" value="{{old('nama_obat')}}" type="text" name="nama_obat" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="harga" placeholder="spesialis" value="{{old('harga')}}" type="text" name="harga" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="keterangan" placeholder="No Telp" value="{{old('keterangan')}}" type="text" name="keterangan" class="form-control " required="">
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