@extends('app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                     <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-title">Cetak Rekam Medis</h4>
                    </div>
                    <!--end card-header-->
                    <form action="{{route('laporan.cetak')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                    <input type="text" name="tgl_laporan" class="form-control mb-2" id="mdate">
                    <button type="submit" class="btn btn-primary ms-auto w-100">Cetak Data</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection