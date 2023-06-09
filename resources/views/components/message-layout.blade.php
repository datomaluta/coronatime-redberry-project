<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/corona.png') }}">
    <title>Corona Time</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"> @vite('resources/css/app.css')
    @vite(['resources/js/validations.js'])
</head>

<body class="h-screen flex items-center flex-col font-inter px-4 pb-10 ">
    <div class="mt-10 sm:self-start">
        <x-svgs.logo/>
    </div>

    {{$slot}}

</body>

</html>
