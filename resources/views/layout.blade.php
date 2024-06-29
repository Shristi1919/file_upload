<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Laravel Product CRUD</title> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
            flex-direction: column;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
            padding: 15px;
            flex-shrink: 0;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.8);
        }
        .header {
            width: 100%;
            height: 60px;
            background: #007bff;
            color: #fff;
            padding: 15px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-right: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Menu</h4>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('posts.index') }}">Posts</a>
    </div>

    <!-- Main Content Area -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('user.profile.edit') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container mt-5">
            @yield('content')
        </div>
    </div>

    <!-- jQuery (ensure it's included only once) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Toastr JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr Configuration -->
    <script>
        $(document).ready(function() {
            @if(Session::has('success_message'))
                toastr.success("{{ Session::get('success_message') }}", 'Success');
            @endif

            @if(Session::has('error_message'))
                toastr.error("{{ Session::get('error_message') }}", 'Error');
            @endif

            @if(Session::has('info_message'))
                toastr.info("{{ Session::get('info_message') }}", 'Info');
            @endif

            @if(Session::has('warning_message'))
                toastr.warning("{{ Session::get('warning_message') }}", 'Warning');
            @endif
        });
    </script>
</body>
</html>
