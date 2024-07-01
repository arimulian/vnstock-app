<!DOCTYPE html>
<html class="h-full bg-white" lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css'])
</head>
<body class="h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-16 w-auto" src="{{ Vite::asset('resources/images/logo.png') }}" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
            account</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form method="post" action="/login" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    email</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300
                text-gray-900
                text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                @error('email')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    password</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300
                text-gray-900
                text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5
                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                @error('password')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="text-white bg-purple-600 hover:bg-purple-800 focus:ring-4 focus:outline-none
            focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center
            dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                Submit
            </button>
        </form>
    </div>
</div>
</body>
</html>
