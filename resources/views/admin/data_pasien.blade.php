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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%">
                                    <thead>
                                            <tr>
                                                <th >No</th>
                                                <th>Nama pasien</th>
                                                <th>No RM</th>
                                                <th >Jenis Kelamin</th>
                                                <th >NIK</th>
                                                <th>No Telp</th>
                                                <th>Alamat</th>
                                                <th>Jenis Pasien</th>
                                                
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @php
                                         if($rm->isEmpty()){
                                           $rekambos = [];
                                         }else{
 foreach ($rm as $rkm){
                                               $rekambos[]= $rkm->id_pasien;

                                             }
                                         }
                                            
                                         @endphp
                                            <?php $no = 1; ?>
                                           @foreach ($Pasien as $ps)
                                                <tr class="odd">
                                                  
                                                    <td tabindex="0" class="">{{$no++}}</td>
                                                    <td class="sorting_1">{{$ps->nama_pasien}}</td>
                                                    <td>{{$ps->no_rm}}</td>
                                                    <td>{{$ps->gender}}</td>
                                                    <td>{{$ps->nik}}</td>
                                                    <td>{{$ps->no_telp}}</td>
                                                    <td>{{$ps->alamat}}</td>
                                                    <td>@php
                                                     if($ps !=null){}
                                                        if(in_array($ps->id_pasien,$rekambos)){
                                                          echo "Lama";
                                                        }else{
                                                          echo "Baru";
                                                        }
                                                    @endphp</td>
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
         $('#rm_update').val(datapas.no_rm)
        $('#gender_update').val(datapas.gender)
        $('#namapas_update').val(datapas.nama_pasien)
        $('#nik_update').val(datapas.nik)
        $('#no_update').val(datapas.no_telp)
        $('#alamat_update').val(datapas.alamat)
 $('#ttl_update').val(datapas.ttl)
  $('#pekerjaan_update').val(datapas.pekerjaan)
   $('#pendidikan_update').val(datapas.pendidikan)
    $('#status_update').val(datapas.status)
     $('#agama_update').val(datapas.agama)


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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
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
                <option selected hidden disabled>Pilih Gender</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>
         <div class="form-group" >
        <input  placeholder="NIK" value="{{old('nik')}}" type="text" name="nik" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="No Telp" value="{{old('no_telp')}}" type="text" name="no_telp" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Alamat" value="{{old('alamat')}}" type="text" name="alamat" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="TTL" value="{{old('ttl')}}" type="text" name="ttl" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Pekerjaan" value="{{old('pekerjaan')}}" type="text" name="pekerjaan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Pendidikan" value="{{old('pendidikan')}}" type="text" name="pendidikan" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input  placeholder="Status" value="{{old('status')}}" type="text" name="status" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input  placeholder="agama" value="{{old('agama')}}" type="text" name="agama" class="form-control " required="">
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
        <h5 class="modal-title" id="exampleModalLabel">Detail Dan Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('DataPasien.update')}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="form-group" >
        <input hidden id="id_update" value="" type="text" name="id_update" class="form-control " required="">
        </div>
          <div class="form-group" >
        <input id="rm_update" value="" type="text" name="no_rm" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input id="namapas_update" placeholder="Nama Pasien" value="{{old('nama_pasien')}}" type="text" name="nama_pasien" class="form-control " required="">
        </div>
         <div class="form-group">
            <select class="form-select" id="gender_update" aria-label="Default select example" name="gender">
                <option selected hidden disabled>Pilih Gender</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>
         <div class="form-group" >
        <input id="nik_update" placeholder="nik" value="{{old('nik')}}" type="text" name="nik" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="no_update" placeholder="No Telp" value="{{old('no_telp')}}" type="text" name="no_telp" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="alamat_update" placeholder="Alamat" value="{{old('alamat')}}" type="text" name="alamat" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="ttl_update" placeholder="TTL" value="{{old('ttl')}}" type="text" name="ttl" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="pekerjaan_update" placeholder="Pekerjaan" value="{{old('pekerjaan')}}" type="text" name="pekerjaan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="pendidikan_update" placeholder="Pendidikan" value="{{old('pendidikan')}}" type="text" name="pendidikan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="status_update" placeholder="Status" value="{{old('status')}}" type="text" name="status" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="agama_update" placeholder="Agama" value="{{old('agama')}}" type="text" name="agama" class="form-control " required="">
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