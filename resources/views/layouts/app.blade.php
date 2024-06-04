<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css','resources/js/app.js'])
        <title>{{ $title ?? config('app.name') }}</title>
        <meta name="theme-color" content="#ffffff">
    </head>

    <script>

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <body class="bg-gray-50 dark:bg-gray-800">
    {{-- partial "navbar-dashboard" . --}}
    <livewire:component.navbar/>
    {{-- partial "navbar-dashboard" . --}}

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

        {{-- partial "sidebar" . --}}
        <livewire:component.sidebar/>
        {{-- partial "sidebar" . --}}


        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                {{-- .Content --}}
                {{ $slot }}
            </main>

            {{-- if .Params.footer }} {{ partial "footer-dashboard" .-- }} {{ end --}}
        </div>

    </div>
    </body>
</html>
