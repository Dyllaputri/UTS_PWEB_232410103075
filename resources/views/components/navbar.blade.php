<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">BukuKu</a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}?user={{ $username }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pengelolaan') ? 'active' : '' }}"
                    href="{{ route('pengelolaan') }}">Koleksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}"
                        href="{{ route('profile') }}?user={{ $username }}">Profile</a>
                </li>
            </ul>

            @if(session('logged_in'))
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
            @endif
            </div>
        </div>
    </nav>
</body>
</html>
