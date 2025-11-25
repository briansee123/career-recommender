<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <style>
        body {
            background: #f7f7f7;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background: #6c63ff;
            padding: 15px;
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .content {
            width: 90%;
            max-width: 900px;
            margin: 30px auto;
        }
    </style>

    @stack('styles')
</head>
<body>

    <div class="navbar">
        Career Test
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
