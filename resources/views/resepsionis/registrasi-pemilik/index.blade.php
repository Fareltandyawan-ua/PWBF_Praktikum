<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Pemilik</title>
    <link rel="stylesheet" type="text/css" href="../../css/dashboard_resepsionis.css">
</head>
<body>
    <div class="header">
        <div class="logo"></div>
        <h2>Registrasi Pemilik</h2>
        <div class="nav">
            <a href="dashboard_resepsionis.php">Dashboard</a>
            <a href="../../auth/logout.php">Logout</a>
        </div>
    </div>
    <div class="content">
        <?php if (!empty($msg)): ?>
            <?php
                $msg_class = 'msg-success';
                if (strpos($msg, 'sudah terdaftar') !== false || strpos($msg, 'gagal') !== false || strpos($msg, 'Gagal') !== false) {
                    $msg_class = 'msg-error';
                }
            ?>
            <div class="<?= $msg_class ?>">
                <?= htmlspecialchars($msg) ?>
            </div>
        <?php endif; ?>
        
        <form method="post" class="form-box">
            <label>Nama Pemilik</label>
            <input type="text" name="nama" required>
            
            <label>Email</label>
            <input type="email" name="email" required>
            
            <label>Password</label>
            <input type="password" name="password" required>
            
            <label>No. WA</label>
            <input type="text" name="no_wa" required>
            
            <label>Alamat</label>
            <input type="text" name="alamat" required>
            
            <div class="form-actions">
                <a class="tambah-btn" href="{{ route('resepsionis.dashboard-resepsionis') }}">Kembali</a>
                <button type="submit" class="tambah-btn">Registrasi</button>
            </div>
        </form>
    </div>
</body>
</html>