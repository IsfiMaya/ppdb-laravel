<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Required</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-orange-100">
        <div class="p-8 bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-2xl font-bold">Login Required</h1>
            <p class="mb-4">You need to be logged in to access this page.</p>
            <a href="{{ route('login') }}" class="px-4 py-2 text-white bg-green-600 rounded-md">Login</a>
        </div>
    </div>
</body>
</html>
