<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rekam Medis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    {{-- <h1>{{ $title }}</h1>
    <p>{{ $date }}</p> --}}
    <h1 style="margin-left: 25%; margin-bottom: 20px">Laporan Rekam Medis</h1>
  
    <table class="table table-bordered" style="margin-left: -5% ">
        <tr style="background: #F08080">
            <th>No</th>
             <th>Date</th>
            <th>Patient</th>
            <th>MR Number</th>
            <th>Poly</th>
            <th>Doctor</th>
            {{-- <th>Keluhan</th> --}}
            <th>Paint Complaint</th>
            <th>Diagnosis</th>
            <th>Medical Prescription</th>
           

        </tr>
        @php
            $no =1;
        @endphp
        @foreach($dataku as $dt)
        <tr>
            <td>{{ $no++ }}</td>
                        <td>{{ $dt->tgl_periksa }}</td>

            <td>{{ $dt->getPasienId->nama_pasien }}</td>
            <td>{{ $dt->getPasienId->no_rm }}</td>
            <td>{{$dt->getPoli->nama_poliklinik}}</td>
            <td>{{ $dt->getDokterId->nama_dokter }}</td>
             <td>{{$dt->keluhan}}</td>
            {{-- <td>{{$dt->keluhan}}</td> --}}
            <td>{{$dt->diagnosa}}</td>
            <td>{{$dt->resep_obat}}</td>
        </tr>
        @endforeach
    </table>
    <table style="width: 100% ; margin-top:20px ; margin-bottom: 150px; ">
        <thead>
            <tr>
                <th style="text-align: left; padding-left: 20%;">
                    <div class="col">

                    </div>
                    <div class="col" style="margin-top: 5px;">
                      
                    </div>
                </th>
                <th style="text-align: center ; ">
                    <div class="col" style="margin-left: 30%"> Jakarta,<?= date('Y-m-d') ?>
                    </div>
                    <div class="col" style="margin-top: 5px; margin-left: 30%">
                        {{Auth::user()->username}}

                    </div>
                </th>
            </tr>
        </thead>
    </table>
  
</body>
</html>