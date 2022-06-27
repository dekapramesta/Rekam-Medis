@extends('app')
@section('content')
    <div class="page-content" style="background-color: #FDEFE0">
    <div class="container-fluid">
      <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex">
                  <h4 class="card-title">Poliklinik</h4>
                  <button onclick="TambahPoli()" class="btn btn-primary ms-auto">Tambah Data</button>
                </div>
                <!--end card-header-->
                <div class="card-body">
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Poli</th>
                        <th>Gedung</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($poliklinik as $pol)
                        <tr>
  <td>{{$no++}}</td>
                               <td>{{$pol->nama_poliklinik}}</td>
                                <td>{{$pol->gedung}}</td>
                                <td> <a onclick="UpdatePol('{{$pol}}')" id="bElim" type="button" class="btn btn-sm btn-soft-success btn-circle" href="#"><i class="dripicons-pencil" aria-hidden="true"></i></a>
                                      <form action="{{route('poliklinik.delete',$pol->id)}}" method="POST"  style="display: inline-flex">
                                            @csrf
                                            @method('DELETE')
                                      <button id="bElim" type="submit" class="btn btn-sm btn-soft-danger btn-circle"><i class="dripicons-trash" aria-hidden="true"></i></button>
                                          </form>
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
     function UpdatePol(data){
        let pol = JSON.parse(data)
        console.log(pol);
        $('#update_id').val(pol.id)
        $('#update_nama').val(pol.nama_poliklinik)
        $('#update_gedung').val(pol.gedung)
        $('#poliklinik_update').appendTo("body").modal('show');
        //         $('#id_rm').val(rm.id)
        // $('#update_dokter').val(rm.get_dokter_id.id)
        // $('#update_pasien').val(rm.get_pasien_id.id_pasien)
        // $('#update_keluhan').val(rm.keluhan)
        // $('#update_diagnosa').val(rm.diagnosa)



        // let select = document.querySelector('#gender_update');
        // select.value = datapas.gender
        // $('#update_rm').appendTo("body").modal('show');
    }
    function TambahPoli(){
        $('#tambah_poliklinik').appendTo("body").modal('show');
    }
</script>
<div class="modal fade" id="tambah_poliklinik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Poliklinik</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('poliklinik.simpan')}}" method="post">
        @csrf
      <div class="modal-body">
          <div class="form-group" >
        <input id="nama_poliklinik" placeholder="Nama Poliklinik" value="{{old('nama_poliklinik')}}" type="text" name="nama_poliklinik" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="gedung" placeholder="Gedung" value="{{old('gedung')}}" type="text" name="gedung" class="form-control " required="">
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
<div class="modal fade" id="poliklinik_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail dan Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('poliklinik.update')}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="form-group" >
        <input hidden id="update_id" type="text" name="id" class="form-control " required="">
        <input id="update_nama" placeholder="Keluhan" value="{{old('nama_poliklinik')}}" type="text" name="nama_poliklinik" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="update_gedung" placeholder="Keluhan" value="{{old('gedung')}}" type="text" name="gedung" class="form-control " required="">
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