<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <script defer src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="max-h-[75vh] bg-gray-100 flex flex-col items-center justify-center text-gray-500">
    @include('header')

    <main class="pt-20 pb-20">
        <div class="max-w-7xl mx-auto px-4 py-6">
            @yield('contenu')
        </div>
    </main>

    @yield('scripts')

    @include('footer')
</body>

</html>
