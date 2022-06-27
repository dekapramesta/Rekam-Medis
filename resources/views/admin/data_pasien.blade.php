@extends('app')
@section('content')
    <div class="page-content" style="background-color: #FDEFE0">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                      <div class="col">
                       <h4 class="card-title">Patient Data</h4>

                      </div>
                        <button onclick="PasienLama()" class="btn btn-secondary me-2">Checkup For Registered Patient</button>
                        <button onclick="TambahPasien()" class="btn btn-primary ms-auto">Add Patient</button>
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
                                                <th>Patient Name</th>
                                                <th>Medical Number</th>
                                                <th >Gender</th>
                                                <th >NIN</th>
                                                <th>Telp Num</th>
                                                <th>Address</th>
                                                <th>Patient Type</th>
                                                
                                                <th>Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @php
                                        //  if($rm->isEmpty()){
                                        //    $rekambos = [];
                                        //  }else{
                                        //  foreach ($rm as $rkm){
                                        //        $rekambos[]= $rkm->id_pasien;

                                        //      }
                                        //  }
                                            
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
                                                        $tgl = null;
                                                    @endphp
                                                      @foreach ($rm as $rkm)
                                                      @if ($ps->id_pasien == $rkm->id_pasien)
                                                      @if (!is_null($rkm->tgl_periksa))
                                                          @php
                                                              $tgl = $rkm->tgl_periksa;
                                                          @endphp
                                                      @endif
                                                      @endif
                                                      @endforeach
                                                      @if (is_null($tgl))
                                                          Baru
                                                      @else
                                                          Lama
                                                      @endif
                                                    </td>
                                                    <td class="text-center">
                                                      <div class="d-flex justify-content-evenly">
                                                       
                                                    
                                                        {{-- <button type="button" onclick="" class="btn btn-soft-primary btn-sm "><i class="mdi mdi-plus me-2"></i>Check Up</button> --}}
                                                        <button onclick="UpdatePasien('{{$ps}}')" id="bElim" type="button" class="btn btn-sm btn-soft-success btn-circle" href=""><i class="dripicons-pencil me-2" aria-hidden="true"></i>Edit</button>
                                                        <form action="{{route('DataPasien.delete',$ps->id_pasien)}}" method="POST"  style="display: inline-flex">
                                                              @csrf
                                                              @method('DELETE')
                                                              <button id="bElim" type="submit" class="btn btn-sm btn-soft-danger"><i class="dripicons-trash me-2" aria-hidden="true"></i>Delete</button>
                                                            </form>
                                                          
                                                      </div>
                                                        <!-- <button onclick="Coba()" type="button" class="btn btn-sm btn-soft-success btn-circle me-2"><i class="dripicons-pencil"></i></button> -->
                                                       
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
                  $(".select2").select2({
                    dropdownParent: $("#tambah_pasien")
                });

             }
              function PasienLama() {
                 $('#pasien_lama').appendTo("body").modal('show');
                  $(".select2").select2({
                    dropdownParent: $("#pasien_lama")
                });

             }
</script>
<div class="modal fade" id="tambah_pasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('DataPasien.simpan')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="form-group" >
        <input  placeholder="Patient Name" value="{{old('nama_pasien')}}" type="text" name="nama_pasien" class="form-control " required="">
        </div>
         <div class="form-group">
            <select class="form-select" aria-label="Default select example" name="gender">
                <option selected hidden disabled>Gender</option>
                <option value="Pria">Masculine</option>
                <option value="Wanita">Feminine</option>
            </select>
        </div>
         <div class="form-group" >
        <input  placeholder="NIN" value="{{old('nik')}}" type="text" name="nik" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Telp Num" value="{{old('no_telp')}}" type="text" name="no_telp" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Address" value="{{old('alamat')}}" type="text" name="alamat" class="form-control " required="">
        </div>
         <div class="form-group">
               <select class="select2 form-control mb-3 custom-select" name="id_dokter" style="width: 100%; height:36px;">
          <option disabled selected>Doctor</option>
            @foreach ($dokter as $dk)
                <option value="{{$dk->id}}">{{$dk->nama_dokter}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group">
        <select class="select form-control mb-3 " name="id_poli" style="width: 100%; height:36px;">
                <option disabled selected>Poly</option>
                  @foreach ($poliklinik as $pk)
                      <option value="{{$pk->id}}">{{$pk->nama_poliklinik  }}</option>
                  @endforeach
        </select>
        </div>
       
       
      
         <div class="form-group" >
        <input  placeholder="Place,Birth date" value="{{old('ttl')}}" type="text" name="ttl" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Job" value="{{old('pekerjaan')}}" type="text" name="pekerjaan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Education" value="{{old('pendidikan')}}" type="text" name="pendidikan" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input  placeholder="Status" value="{{old('status')}}" type="text" name="status" class="form-control " required="">
        </div>
        <div class="form-group" >
        <input  placeholder="Religion" value="{{old('agama')}}" type="text" name="agama" class="form-control " required="">
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
        <h5 class="modal-title" id="exampleModalLabel">Detail and Edit</h5>
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
        <input id="namapas_update" placeholder="Patient Name" value="{{old('nama_pasien')}}" type="text" name="nama_pasien" class="form-control " required="">
        </div>
         <div class="form-group">
            <select class="form-select" id="gender_update" aria-label="Default select example" name="gender">
                <option selected hidden disabled>Pilih Gender</option>
                <option value="Pria">Masculine</option>
                <option value="Wanita">Feminine</option>
            </select>
        </div>
         <div class="form-group" >
        <input id="nik_update" placeholder="NIN" value="{{old('nik')}}" type="text" name="nik" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="no_update" placeholder="Telp Num" value="{{old('no_telp')}}" type="text" name="no_telp" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="alamat_update" placeholder="Address" value="{{old('alamat')}}" type="text" name="alamat" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="ttl_update" placeholder="Place, Birth Date" value="{{old('ttl')}}" type="text" name="ttl" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="pekerjaan_update" placeholder="Job" value="{{old('pekerjaan')}}" type="text" name="pekerjaan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="pendidikan_update" placeholder="Education" value="{{old('pendidikan')}}" type="text" name="pendidikan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="status_update" placeholder="Status" value="{{old('status')}}" type="text" name="status" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="agama_update" placeholder="Religion" value="{{old('agama')}}" type="text" name="agama" class="form-control " required="">
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
<div class="modal fade" id="pasien_lama" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('pasienlama.simpan')}}" method="post">
        @csrf
      <div class="modal-body">
                 <div class="form-group">
               <select class="select2 form-control mb-3 custom-select" name="id_pasien" style="width: 100%; height:36px;">
          <option disabled selected>Patient</option>
            @foreach ($Pasien as $ps)
            @php
                $old = null;
            @endphp
            @foreach ($rm as $rkm)
              @if ($ps->id_pasien == $rkm->id_pasien)
              @if (!is_null($rkm->tgl_periksa))
              @php
                  $old = $rkm->tgl_periksa;
              @endphp
          @endif  
              @endif
              @endforeach
              @if (!is_null($old))
              <option value="{{$ps->id_pasien}}">{{$ps->nama_pasien}}-{{$ps->no_rm}}</option>  
              @endif
            @endforeach
        </select>
        </div>
        
         <div class="form-group">
               <select class="select2 form-control mb-3 custom-select" name="id_dokter" style="width: 100%; height:36px;">
          <option disabled selected>Doctor</option>
            @foreach ($dokter as $dk)
                <option value="{{$dk->id}}">{{$dk->nama_dokter}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group">
        <select class="select form-control mb-3 " name="id_poli" style="width: 100%; height:36px;">
                <option disabled selected>Poly</option>
                  @foreach ($poliklinik as $pk)
                      <option value="{{$pk->id}}">{{$pk->nama_poliklinik  }}</option>
                  @endforeach
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