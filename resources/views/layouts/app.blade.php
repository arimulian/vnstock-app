<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js', 'resources/js/dark-mode.js'])
    <title>{{ $title ?? config('app.name') }}</title>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body>
{{-- partial "navbar-dashboard" . --}}
<x-navbar/>
{{--//partial "navbar-dashboard" . --}}
<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

    {{-- partial "sidebar" . --}}
    <x-sidebar/>
    {{--//partial "sidebar" . --}}

    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main>
            {{-- .Content --}}
            {{ $slot }}
        </main>
        {{-- if .Params.footer }} {{ partial "footer-dashboard" . }} {{ end --}}
    </div>

</div>

</body>
</html>
