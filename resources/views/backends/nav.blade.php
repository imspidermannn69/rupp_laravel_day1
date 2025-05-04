<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .sidebar a:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 p-0 sidebar">
                <div class="p-3">
                    <h3>Admin Panel</h3>
                </div>
                <nav>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('features') }}">Features</a>
                    <a href="{{ route('features.create') }}">Add Feature</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content">
