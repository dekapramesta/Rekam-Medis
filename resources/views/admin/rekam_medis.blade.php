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
                  <h4 class="card-title">Rekam Medis</h4>
                  <button onclick="TambahRM()" class="btn btn-primary ms-auto">Tambah Data</button>
                </div>
                <!--end card-header-->
                <div class="card-body">
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Dokter</th>
                        <th>Nama Pasien</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Tanggal Periksa</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($rm as $rkm)
                            <tr>
                        <td>{{$no++}}</td>
                        <td>{{$rkm->getDokterId->nama_dokter}}</td>
                        <td>{{$rkm->getPasienId->nama_pasien}}</td>
                        <td>{{$rkm->diagnosa}}</td>
                        <td>{{$rkm->keluhan}}</td>
                        <td>{{$rkm->tgl_periksa}}</td>
                        <td>
                          <Button onclick="UpdateRM('{{$rkm}}')"id="bElim" type="button" class="btn btn-sm btn-soft-success btn-circle" href=""><i class="dripicons-pencil" aria-hidden="true"></i></Button>
                           <form action="{{route('rekammedis.delete',$rkm->id)}}" method="POST"  style="display: inline-flex">
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
            <!-- end col -->
          </div> <!-- end row -->
    </div>
</div>
<script>
  function UpdateRM(data){
        let rm = JSON.parse(data)
        console.log(rm.get_dokter_id.id);
                $('#id_rm').val(rm.id)
        $('#update_dokter').val(rm.get_dokter_id.id)
        $('#update_pasien').val(rm.get_pasien_id.id_pasien)
        $('#update_keluhan').val(rm.keluhan)
        $('#update_diagnosa').val(rm.diagnosa)



        // let select = document.querySelector('#gender_update');
        // select.value = datapas.gender
        $('#update_rm').appendTo("body").modal('show');
    }
   function TambahRM() {
                 $('#tambah_rm').appendTo("body").modal('show');

             }
</script>
<div class="modal fade" id="tambah_rm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('rekammedis.tambah')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="form-group" >
      <select class="select form-control mb-3 " name="id_dokter">
          <option disabled selected>Pilih Dokter</option>
            @foreach ($dokter as $dk)
                <option value="{{$dk->id}}">{{$dk->nama_dokter}}</option>
            @endforeach
        </select>
        <select class="select form-control mb-3 " name="id_pasien" style="width: 100%; height:36px;">
          <option disabled selected>Pilih Pasien</option>
            @foreach ($pasien as $ps)
                <option value="{{$ps->id_pasien}}">{{$ps->nama_pasien}}</option>
            @endforeach
        </select>
        </div>
         <div class="form-group" >
        <input placeholder="Keluhan" value="{{old('keluhan')}}" type="text" name="keluhan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Diagnosa" value="{{old('diagnosa')}}" type="text" name="diagnosa" class="form-control " required="">
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
<div class="modal fade" id="update_rm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('rekammedis.update')}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="form-group" >
                  <input id="id_rm" placeholder="Keluhan" value="{{old('keluhan')}}" type="text" name="id" class="form-control " required="">
      <select id="update_dokter" class="select form-control mb-3 " name="id_dokter">
          <option disabled selected>Pilih Dokter</option>
            @foreach ($dokter as $dk)
                <option value="{{$dk->id}}">{{$dk->nama_dokter}}</option>
            @endforeach
        </select>
        <select id="update_pasien" class="select form-control mb-3 " name="id_pasien" style="width: 100%; height:36px;">
          <option disabled selected>Pilih Pasien</option>
            @foreach ($pasien as $ps)
                <option value="{{$ps->id_pasien}}">{{$ps->nama_pasien}}</option>
            @endforeach
        </select>
        </div>
         <div class="form-group" >
        <input id="update_keluhan" placeholder="Keluhan" value="{{old('keluhan')}}" type="text" name="keluhan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input id="update_diagnosa" placeholder="Diagnosa" value="{{old('diagnosa')}}" type="text" name="diagnosa" class="form-control " required="">
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