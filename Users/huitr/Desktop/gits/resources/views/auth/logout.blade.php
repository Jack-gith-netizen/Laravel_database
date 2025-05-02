<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Logout page">
    <title>Logout - BCIT Student Database</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/logout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
</head>
<body>
    <header></header>
    <main>
        <h1>You have been logged out.</h1>
        @if ($timeoutMessage)
            <p class="timeout-message">{{ $timeoutMessage }}</p>
        @endif
        <p>You were logged in for <strong>{{ $sessionDuration }}</strong> seconds.</p>
        <a href="{{ route('login') }}">Go back to login page</a>
    </main>
    <footer>
        <p>2025 © BCIT Student Database</p>
    </footer>
</body>
</html>