<!DOCTYPE html>
<html lang="it" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/dd0a70f8ad.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
    <title>Document</title>
</head>
<body>
    <x-navbar />

    <div class="min-vh-100">
        {{ $slot }}
    </div>

    <x-footer />
</body>
</html>