<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login form.">
    <meta name="keywords" content="BCIT, PHP, Web Development, Login Form, MySQL">
    <title>Login - BCIT Student Database</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to BCIT Student Database</h1>
        </header>
        <main id="wrapper">
            @if ($errors->any())
                <div class="error-messages">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    <p><a href="{{ route('login') }}">Please correct the errors and submit the form again.</a></p>
                </div>
            @endif

            @if ($infoMessage)
                <div class="info-message">
                    <p>{{ $infoMessage }}</p>
                </div>
            @endif

            <section class="login-section">
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label><br>
                        <input type="text" name="username" id="username" value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password">
                    </div>
                    <input type="submit" value="Login" class="submit-button">
                </form>
            </section>
        </main>
        <footer>
            <p>2025 © BCIT Student Database</p>
        </footer>
    </div>
</body>
</html>