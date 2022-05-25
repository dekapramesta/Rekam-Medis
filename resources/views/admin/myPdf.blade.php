<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    {{-- <h1>{{ $title }}</h1>
    <p>{{ $date }}</p> --}}
    <h1 style="margin-left: 20%">Laporan Rekam Medis</h1>
  
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nama Pasien</th>
            <th>Nama Dokter</th>
            <th>Tanggal Periksa</th>

        </tr>
        @foreach($dataku as $dt)
        <tr>
            <td>{{ $dt->id }}</td>
            <td>{{ $dt->getPasienId->nama_pasien }}</td>
            <td>{{ $dt->getDokterId->nama_dokter }}</td>
            <td>{{ $dt->created_at }}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>