<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" type="image/png" href="https://3bird.nl/wp-content/uploads/2023/09/cropped-3bird-favicon-32x32.png"/>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'selected' : '' }}">Dashboard</a>
        <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.index') ? 'selected' : '' }}">Products</a>
        <a href="{{ route('posts.index') }}" class="{{ request()->routeIs('posts.index') ? 'selected' : '' }}">Posts</a>
    </div>


    <!-- Main Content Area -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-right:80px;">
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
