

@extends('app')
@section('content')
      
<div class="page-content" style="background-color: #FDEFE0">
    <div class="container-fluid">
        <div class="row  justify-content-center">
            <div class="col-8 mt-5">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-title">Tambah Rekam Medis</h4>
                        <!-- <button onclick="TambahPasien()" class="btn btn-primary ms-auto">Tambah Data</button> -->
                    </div>
                    <!--end card-header-->
                    <form action="{{route('rekammedis.tambah')}}" method="post" enctype="multipart/form-data">
                                @csrf

                        <div class="card-body ">
                            <div class="section-title">Dokter</div>
                            <div class="form-group">
                                <select class="select2 form-control mb-3 custom-select" name="id_dokter" style="width: 100%; height:36px;">
                                                  <option disabled selected>Pilih Dokter</option>
            @foreach ($dokter as $dk)
                <option value="{{$dk->id}}">{{$dk->nama_dokter}}</option>
            @endforeach
                                            </select>
                            </div>
                             <div class="section-title">Pasien</div>
                            <div class="form-group">
                                <select class="select2 form-control mb-3 custom-select" name="id_pasien" style="width: 100%; height:36px;">
                                                <option disabled hidden selected>Pilih Pasien</option>
                                                      @foreach ($pasien as $ps)
                <option value="{{$ps->id_pasien}}">{{$ps->no_rm."-".$ps->nama_pasien}}</option>
            @endforeach
                                 </select>
                            </div>
                             <div class="section-title">Poliklinik</div>
                            <div class="form-group">
                                <select class="select2 form-control mb-3 custom-select" name="id_poli" style="width: 100%; height:36px;">
                                                <option disabled hidden selected>Pilih Poliklinik</option>
                                               @foreach ($poliklinik as $pk)
                <option value="{{$pk->id}}">{{$pk->nama_poliklinik  }}</option>
            @endforeach
                                            </select>
                            </div>
                            <div class="section-title">Keluhan</div>
                            <div class="form-group">
                                <input name="keluhan" class="form-control"  type="text">
                            </div>
                             <div class="section-title">Diagnosa</div>
                            <div class="form-group">
                                <input name="diagnosa" class="form-control"  type="text">
                            </div>
                             <div class="section-title">Tindakan</div>
                            <div class="form-group">
                                <input name="tindakan" class="form-control"  type="text">
                            </div>
                             <div class="section-title">Obat</div>
                            <div class="form-group">
                                <input name="resep_obat" class="form-control"  type="text">
                            </div>

                            <button type="submit" class="btn btn-primary ms-auto w-100">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
      <!-- Page Content-->
    
