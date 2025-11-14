<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: #f7f7f7;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #343a40;
            transition: width 0.3s;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar a {
            color: #ddd;
            padding: 12px;
            display: block;
            text-decoration: none;
            font-size: 15px;
            white-space: nowrap;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .sidebar .icon-only {
            display: inline-block;
            width: 20px;
        }

        .collapsed .text {
            display: none;
        }

        .collapsed .icon-only {
            display: inline-block !important;
        }

        .content-wrapper {
            width: 100%;
            padding: 25px;
            transition: margin-left 0.3s;
        }
    </style>
</head>