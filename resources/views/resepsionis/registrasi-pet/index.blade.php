<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Registrasi Pet</title>
    <link rel="stylesheet" type="text/css" href="../../css/dashboard_resepsionis.css">
</head>

<body>
    <div class="header">
        <div class="logo"></div>
        <h2>Registrasi Pet</h2>
        <div class="nav">
            <a href="dashboard_resepsionis.php">Dashboard</a>
            <a href="../../auth/logout.php">Logout</a>
        </div>
    </div>
    <div class="content">
        <?php if (!empty($msg))
            echo "<div class='msg'>$msg</div>"; ?>
        <form method="post" class="form-box">
            <label>Nama Pet</label>
            <input type="text" name="nama" required>
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" required>
            <label>Warna Tanda</label>
            <input type="text" name="warna_tanda" required>
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="L">Jantan</option>
                <option value="P">Betina</option>
            </select>
            <label>ID Pemilik</label>
            <select name="idpemilik" required>
                <option value="">-- Pilih Pemilik --</option>
                    </option>
            </select>
            <label>ID Ras Hewan</label>
            <select name="idras_hewan" required>
                <option value="">-- Pilih Ras Hewan --</option>
            </select>
            <div class="form-actions">
                <a class="tambah-btn" href="{{ route('resepsionis.dashboard-resepsionis') }}">Kembali</a>
                <button type="submit" class="tambah-btn">Registrasi</button>
            </div>
        </form>
    </div>
</body>
</html>