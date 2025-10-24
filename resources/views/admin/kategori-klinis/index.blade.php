<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Klinis</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori Klinis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoriKlinis as $index=>$dataKategoriKlinis)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dataKategoriKlinis->nama_kategori_klinis }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>