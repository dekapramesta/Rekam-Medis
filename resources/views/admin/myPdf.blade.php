<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    {{-- <h1>{{ $title }}</h1>
    <p>{{ $date }}</p> --}}
    <h1 style="margin-left: 25%; margin-bottom: 20px">Laporan Rekam Medis</h1>
  
    <table class="table table-bordered">
        <tr style="background: #F08080">
            <th>#</th>
            <th>Nama Pasien</th>
            <th>No RM</th>
            <th>Poli</th>
            <th>Nama Dokter</th>
            {{-- <th>Keluhan</th> --}}
            <th>Diagnosa</th>
            <th>Tindakan</th>
            <th>Obat</th>
            {{-- <th>Tanggal Periksa</th> --}}

        </tr>
        @php
            $no =1;
        @endphp
        @foreach($dataku as $dt)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $dt->getPasienId->nama_pasien }}</td>
            <td>{{ $dt->getPasienId->no_rm }}</td>
            <td>{{$dt->getPoli->nama_poliklinik}}</td>
            <td>{{ $dt->getDokterId->nama_dokter }}</td>
             <td>{{$dt->diagnosa}}</td>
            {{-- <td>{{$dt->keluhan}}</td> --}}
            <td>{{$dt->tindakan}}</td>
            <td>{{$dt->resep_obat}}</td>
            {{-- <td>{{ $dt->tgl_periksa }}</td> --}}
        </tr>
        @endforeach
    </table>
  
</body>
</html>