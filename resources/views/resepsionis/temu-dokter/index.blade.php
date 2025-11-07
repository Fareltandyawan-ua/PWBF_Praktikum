<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Temu Dokter</title>
    <link rel="stylesheet" type="text/css" href="../../css/dashboard_resepsionis.css">
</head>
<body>
    <div class="header">
        <div class="logo"></div>
        <h2>Temu Dokter</h2>
        <div class="nav">
            <a href="dashboard_resepsionis.php">Dashboard</a>
            <a href="../../auth/logout.php">Logout</a>
        </div>
    </div>
    <div class="content">
        <?php if (!empty($msg)) echo "<div class='msg'>$msg</div>"; ?>
        <form method="post" class="form-box">
            <label>Pilih Pet</label>
            <select name="idpet" required>
                <option value="">-- Pilih Pet --</option>
            </select>
            <label>Pilih Dokter</label>
            <select name="idrole_user" required>
                <option value="">-- Pilih Dokter --</option>
            </select>
            <div class="form-actions">
                <a class="tambah-btn" href="{{ route('resepsionis.dashboard-resepsionis') }}">Kembali</a>
                <button type="submit" class="tambah-btn">Daftar Temu Dokter</button>
            </div>
        </form>
        <h3 style="margin-top:40px;">Daftar Temu Dokter</h3>
        <table border="1" cellpadding="8" cellspacing="0" style="width:100%;margin-top:10px;">
            <tr style="background:#e3f2fd;">
                <th>No Urut</th>
                <th>Waktu Daftar</th>
                <th>Nama Pet</th>
                <th>Nama Dokter</th>
                <th>Status</th>
            </tr>
                <tr>
                    <td style="text-align:center;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </table>
    </div>
</body>
</html>