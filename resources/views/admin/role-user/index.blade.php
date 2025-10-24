<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role User</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Nama Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roleUser as $index => $dataRoleUser)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dataRoleUser->user->nama }}</td>
                <td>{{ $dataRoleUser->role->nama_role }}</td>
                <td>{{ $dataRoleUser->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>