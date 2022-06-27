@extends('app')
@section('content')
    <div class="page-content" style="background-color: #FDEFE0">
    <div class="container-fluid">
      <div class="row">
            <div class="col-12">
              <div class="card mt-4">
                 @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{$err}}</p>
                        @endforeach
                        @endif
                <div class="card-header d-flex">
                  <h4 class="card-title">General Poly</h4>
                  {{-- <button onclick="TambahRM()" class="btn btn-primary ms-auto">Tambah Data</button> --}}
                </div>
                <!--end card-header-->
                <div class="card-body">
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%">
                    <thead>
                      <tr>
                        <th>Num</th>
                        <th>MR Num</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Diagnosis</th>
                         <th>Action</th>

                        <th>Medical Prescription</th>
                        <th>Pain Complaint</th>
                        <th>Checkup Date</th>
                        <th>Menu</th>
                      </tr>
                    </thead>

                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($rm as $rkm)
                            <tr>
                        <td>{{$no++}}</td>
                        <td>{{$rkm->getPasienId->no_rm}}</td>
                        <td>{{$rkm->getPasienId->nama_pasien}}</td>
                        <td>{{$rkm->getPasienId->gender}}</td>
                        <td>@if (is_null($rkm->diagnosa))
                            Not Checked
                        @elseif(!is_null($rkm->diagnosa))
                            {{$rkm->diagnosa}}
                        @endif</td>
                         <td>@if (is_null($rkm->tindakan))
                            Not Checked
                        @elseif(!is_null($rkm->tindakan))
                            {{$rkm->tindakan}}
                        @endif</td>
                         <td>@if (is_null($rkm->resep_obat))
                            Not Checked
                        @elseif(!is_null($rkm->resep_obat))
                            {{$rkm->resep_obat}}
                        @endif</td>

                         <td>@if (is_null($rkm->keluhan))
                            Not Checked
                        @elseif(!is_null($rkm->keluhan))
                            {{$rkm->keluhan}}
                        @endif</td>
                         
                        <td class="text-center">@if (is_null($rkm->tgl_periksa))
                          Not Checked
                        @elseif(!is_null($rkm->tgl_periksa))
                              {{$rkm->tgl_periksa}}
                        @endif</td>
                         <td class="text-center">@if (is_null($rkm->tgl_periksa))
                          <button type="button" onclick="Checkup('{{$rkm}}')" class="btn btn-outline-primary btn-sm "><i class="mdi mdi-plus me-2">Checkup</i></button>
                        @elseif(!is_null($rkm->tgl_periksa))
                               <button type="button" onclick="CheckupEdit('{{$rkm}}')" class="btn btn-outline-success btn-sm "><i class="mdi mdi-check me-2">Checked</i></button>

                        @endif</td>



                        {{-- <td>{{$rkm->getPoli->nama_pasien}}</td>
                        <td>{{$rkm->diagnosa}}</td>
                        <td>{{$rkm->keluhan}}</td>
                        <td>{{$rkm->resep_obat}}</td>
                        <td>{{$rkm->tgl_periksa}}</td> --}}
                        <td>
                          {{-- <Button onclick="UpdateRM('{{$rkm}}')"id="bElim" type="button" class="btn btn-sm btn-soft-success btn-circle" href=""><i class="dripicons-pencil" aria-hidden="true"></i></Button>
                           <form action="{{route('rekammedis.delete',$rkm->id)}}" method="POST"  style="display: inline-flex">
                                                              @csrf
                                                              @method('DELETE')
                                                        <button id="bElim" type="submit" class="btn btn-sm btn-soft-danger btn-circle"><i class="dripicons-trash" aria-hidden="true"></i></button>
                                                            </form>
                        </td> --}}
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
   function Checkup(data) {
        let id = JSON.parse(data)
$('#id_checkup').val(id.id)
        $('#checkup_modal').appendTo("body").modal('show');
             }
             function CheckupEdit(data) {
        let id = JSON.parse(data)
        $('#keluhan_ed').val(id.keluhan)
        $('#diagnosa_ed').val(id.diagnosa)
         $('#tindakan_ed').val(id.tindakan)

        $('#resep_ed').val(id.resep_obat)
$('#id_checkuped').val(id.id)
        $('#checkup_edit').appendTo("body").modal('show');
             }
</script>
<div class="modal fade" id="checkup_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Checkup</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('polirm.update')}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="form-group" >
        <input placeholder="Pain Complaint" value="{{old('keluhan')}}" type="text" name="keluhan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Diagnosis" value="{{old('diagnosa')}}" type="text" name="diagnosa" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Action" value="{{old('tindakan')}}" type="text" name="tindakan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input hidden value="{{old('id')}}" type="text" id="id_checkup" name="id_checkup" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Medical Prescription" value="{{old('resep_obat')}}" type="text" name="resep_obat" class="form-control " required="">
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
<div class="modal fade" id="checkup_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Checkup</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('checked.update')}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="form-group" >
        <input placeholder="Keluhan" id="keluhan_ed" value="{{old('keluhan')}}" type="text" name="keluhan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Diagnosa" id="diagnosa_ed" value="{{old('diagnosa')}}" type="text" name="diagnosa" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Tindakan" id="tindakan_ed" value="{{old('tindakan')}}" type="text" name="tindakan" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input hidden value="{{old('id')}}"  type="text" id="id_checkuped" name="id_checkup" class="form-control " required="">
        </div>
         <div class="form-group" >
        <input  placeholder="Resep Obat" id="resep_ed" value="{{old('resep_obat')}}" type="text" name="resep_obat" class="form-control " required="">
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