<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>

    <!-- Tambahkan Bootstrap atau CSS lain -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">🐾 Klinik Hewan Admin</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('admin.dashboard-admin') }}" class="nav-link">Dashboard</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link text-danger">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Dinamis -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-3 bg-dark text-white mt-4">
        <small>© {{ date('Y') }} Sistem Informasi Klinik Hewan - Admin</small>
    </footer>

    <!-- Script JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
