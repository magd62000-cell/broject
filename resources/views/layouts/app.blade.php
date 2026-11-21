<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SB Admin 2')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f8f9fc;
            font-family: Arial, sans-serif;
            color: #5a5c69;
        }

        #wrapper {
            display: flex;
            min-height: 100vh;
        }

        #sidebar {
            width: 250px;
            min-width: 250px;
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            color: white;
        }

        .sidebar-brand {
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 19px;
            font-weight: bold;
            letter-spacing: 1px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .sidebar-brand i {
            font-size: 25px;
            margin-right: 10px;
        }

        .sidebar-heading {
            padding: 22px 18px 8px;
            font-size: 10px;
            color: rgba(255,255,255,.55);
            font-weight: bold;
            letter-spacing: 1px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 13px 20px;
            margin: 3px 10px;
            color: rgba(255,255,255,.8);
            text-decoration: none;
            font-size: 14px;
            border-radius: 7px;
            transition: .2s;
        }

        .sidebar-link i {
            width: 25px;
            font-size: 15px;
        }

        .sidebar-link:hover {
            background: rgba(255,255,255,.15);
            color: white;
        }

        .sidebar-link.active {
            background: rgba(255,255,255,.2);
            color: white;
            font-weight: bold;
        }

        #content-wrapper {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            height: 75px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,.04);
        }

        .search-form {
            display: flex;
            width: 350px;
        }

        .search-form input {
            background: #f8f9fc;
            border: none;
            padding: 12px;
        }

        .search-form button {
            border: none;
            padding: 0 18px;
            background: #4e73df;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #858796;
            font-size: 14px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #4e73df;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-content {
            padding: 30px;
            flex: 1;
        }

        .page-title {
            font-size: 26px;
            font-weight: 400;
            color: #5a5c69;
            margin-bottom: 25px;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0,0,0,.06);
            margin-bottom: 25px;
        }

        .card-header {
            background: white;
            padding: 16px 20px;
            border-bottom: 1px solid #e3e6f0;
            color: #4e73df;
            font-weight: bold;
        }

        .card-body {
            padding: 22px;
        }

        footer {
            padding: 22px;
            background: white;
            color: #858796;
            text-align: center;
            font-size: 13px;
        }

        @media(max-width: 768px) {
            #sidebar {
                width: 75px;
                min-width: 75px;
            }

            .sidebar-brand span,
            .sidebar-link span,
            .sidebar-heading {
                display: none;
            }

            .sidebar-brand {
                font-size: 20px;
            }

            .sidebar-link {
                justify-content: center;
                padding: 15px 5px;
            }

            .sidebar-link i {
                width: auto;
            }

            .search-form {
                width: 180px;
            }

            .main-content {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<div id="wrapper">

    <aside id="sidebar">

        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <i class="fas fa-layer-group"></i>
            <span>SB ADMIN 2</span>
        </a>

        <div class="sidebar-heading">CORE</div>

        <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>

        <div class="sidebar-heading">INTERFACE</div>

        <a href="{{ route('tasks.index') }}" class="sidebar-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
            <i class="fas fa-tasks"></i>
            <span>Tasks</span>
        </a>

        <a href="{{ route('users.index') }}" class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>

        <div class="sidebar-heading">ADDONS</div>

        <a href="{{ route('tasks.index') }}" class="sidebar-link">
            <i class="fas fa-chart-bar"></i>
            <span>Charts</span>
        </a>

    </aside>

    <div id="content-wrapper">

        <nav class="topbar">

            <form class="search-form">
                <input class="form-control" type="search" placeholder="Search for...">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <div class="topbar-user">
                <span>Administrator</span>
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
            </div>

        </nav>

        <main class="main-content">

            @yield('content')

        </main>

        <footer>
            Copyright © SB Admin 2 2026
        </footer>

    </div>

</div>

</body>
</html>
