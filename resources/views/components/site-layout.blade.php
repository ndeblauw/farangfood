<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

</head>
<body class="min-h-screen bg-gradient-to-b from-sky-50 to-white text-slate-900" style="font-family: 'Instrument Sans', sans-serif;">

    <div class="flex min-h-screen flex-col">
        <x-site-navigation />

        <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-6 sm:px-6 sm:py-8 lg:px-8 lg:py-10">
            {{ $slot }}
        </main>

        <x-site-footer />
    </div>

</body>
</html>
