<!DOCTYPE html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ Vite::asset('resources/images/logo.png') }}" sizes="60X60"/>
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="antialiased">
<div
        class="flex h-screen bg-gray-50 dark:bg-gray-900"
        :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    <!-- Desktop sidebar -->
    <x-sidebar/>
    {{----}}
    <div class="flex flex-col flex-1 w-full">
        {{--Header--}}
        <x-header/>
        {{----}}
        {{--Main--}}
        {{$slot}}
        {{--//--}}
    </div>
</div>
@livewireScriptConfig
</body>
</html>
