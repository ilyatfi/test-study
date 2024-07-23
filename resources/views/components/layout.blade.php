<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    @vite(['resources/js/app.js'])
</head>
<body class="bg-purple-200">
    <div class="px-20">
        <nav class="flex justify-end gap-x-4 child:items-center py-3">
            @auth
                <x-link href="/products/audit">Show Audit</x-link>
                <x-link href="/products">Products</x-link>
                <form action="/logout" method="POST">
                    @csrf
                    <x-button color="red">Logout</x-button>
                </form>
            @endauth
            @guest
                <x-link href="/login">Login</x-link>
                <x-link href="/register">Register</x-link>
            @endguest
        </nav>
        <main class="flex flex-col items-center">
            {{ $slot }}
        </main>
    </div>
</body>
</html>