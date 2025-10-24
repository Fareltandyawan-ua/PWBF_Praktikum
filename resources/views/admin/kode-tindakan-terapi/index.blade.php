<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Tindakan Terapi</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Deskripsi Tindakan Terapi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kodeTindakanTerapi as $index=> $dataKodeTindakanTerapi)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dataKodeTindakanTerapi->kode }}</td>
                <td>{{ $dataKodeTindakanTerapi->deskripsi_tindakan_terapi }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    
</body>
</html>