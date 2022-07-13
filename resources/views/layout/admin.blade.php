<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel - @yield('title')</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="md:flex antialiased">
        @include('admin.partials.navigation')

        <main class="bg-gray-100 h-screen w-full overflow-y-auto p-5">
            <h1 class="text-2xl mb-4">@yield('page-title')</h1>
            @yield('content')
        </main>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
