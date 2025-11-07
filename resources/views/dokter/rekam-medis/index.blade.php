<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Rekam Medis</title>
    <link rel="stylesheet" href="../../css/data_master.css">
    <link rel="stylesheet" href="../../css/rekam_medis_perawat.css">
</head>

<body>
    <div class="header">
        <div class="logo"></div>
        <h2>Rekam Medis</h2>
        <div class="nav">
            <a href="../../auth/logout.php">Logout</a>
        </div>
    </div>
    <div class="pemilik-container">
        <form method="post">
            <select name="idreservasi_dokter" required onchange="this.form.submit()">
                <option value="">Pilih Reservasi</option>
            </select>
            <input type="text" name="anamnesa" placeholder="Anamnesa"
                required>
            <input type="text" name="temuan_klinis" placeholder="Temuan Klinis"
                required>
            <input type="text" name="diagnosa" placeholder="Diagnosa"
                required>
        </table>
        <br>
         <a href="dashboard_perawat.php" class="button" style="background:#4FC3F7;margin-top:16px;">< Kembali </a>
    </div>
</body>

</html>