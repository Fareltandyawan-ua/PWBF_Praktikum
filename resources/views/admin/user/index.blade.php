<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $index => $dataUser)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dataUser->nama }}</td>
                <td>{{ $dataUser->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>