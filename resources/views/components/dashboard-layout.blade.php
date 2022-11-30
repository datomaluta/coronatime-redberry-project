<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Corona Time</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
     @vite('resources/css/app.css')

     <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-screen font-inter">
    <div class="max-w-[90rem] mx-auto py-5 px-28 sm:px-4">
        <x-dashboard.header/>

        <h1 class="text-dark-100 text-2xl font-extrabold mt-10 sm:text-xl sm:mt-6">Worldwide Statistics</h1>

        <nav class="border-b border-neutral-100 mt-10 pb-4 sm:mt-6">
            <a class="text-base font-bold text-dark-100 border-b-2 border-dark-100 mr-[4.5rem] pb-4 sm:mr-6 sm:text-sm" href="#">Worldwide</a>
            <a class="text-base font-normal text-dark-100 sm:text-sm" href="#">By country</a>
        </nav>

        {{ $slot }}


    </div>
</body>

</html>
