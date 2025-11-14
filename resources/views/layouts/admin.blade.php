<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    @stack('styles')

    <style>
        body {
            margin: 0;
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: #343a40;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            padding: 14px 20px;
            color: #ddd;
            text-decoration: none;
            font-size: 16px;
        }

        .sidebar a:hover {
            background: #495057;
            color: white;
        }

        /* Content */
        .content {
            margin-left: 240px;
            width: calc(100% - 240px);
            padding: 20px;
        }

        /* Top bar */
        .topbar {
            height: 60px;
            background: white;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 20px;
        }

        .admin-icon {
            width: 40px;
            height: 40px;
            background: #6c63ff;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content:center;
            align-items:center;
            cursor: pointer;
        }

    </style>

</head>

<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <h2>ADMIN PANEL</h2>

        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.users') }}">User Management</a>
        <a href="{{ route('admin.jobs') }}">Job Management</a>
        <a href="{{ route('admin.tests') }}">Test Questions</a>
        <a href="{{ route('admin.profile') }}">Admin Profile</a>
    </div>

    {{-- Main Content --}}
    <div class="content">

        {{-- Topbar --}}
        <div class="topbar">

    <div class="admin-dropdown" style="position: relative;">
        <div class="admin-icon" onclick="toggleAdminDropdown()">👤</div>

        <div id="adminDropdownMenu" 
             style="
                display:none;
                position:absolute;
                right:0;
                margin-top:10px;
                background:white;
                width:150px;
                border-radius:8px;
                padding:10px;
                box-shadow:0px 4px 15px rgba(0,0,0,0.15);
             ">
            
            <a href="{{ route('admin.profile') }}" 
               style="display:block; padding:10px; text-decoration:none; color:#333;">
               Profile
            </a>

            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" 
                    style="
                        width:100%; 
                        padding:10px; 
                        background:none; 
                        border:none; 
                        text-align:left; 
                        cursor:pointer;
                    ">
                    Logout
                </button>
            </form>

        </div>
    </div>

</div>

<script>
function toggleAdminDropdown() {
    let menu = document.getElementById('adminDropdownMenu');
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}
</script>


        <div style="margin-top: 20px;">
            @yield('content')
        </div>

    </div>

    @stack('scripts')

</body>
</html>
