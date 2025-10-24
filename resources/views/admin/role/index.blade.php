<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($role as $index => $dataRole)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dataRole->nama_role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>