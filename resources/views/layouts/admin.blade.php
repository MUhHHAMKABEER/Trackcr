<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F8F9FA;
        }
    </style>
    @stack('styles')
</head>

<body class="flex">

    {{-- Sidebar --}}
    @include('partials._sidebar')

    {{-- Main content --}}
    <main class="main-content flex-grow p-8">
        @yield('content')
    </main>

</body>
</html>
