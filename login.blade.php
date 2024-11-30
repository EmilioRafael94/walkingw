<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <!-- Header for the logo -->
    <header>
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/WALKING W LOGO.png') }}" alt="Walking W Logo">
            </a>
        </div>
    </header>

    <div class="container">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Email -->
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div>
                <button type="submit">Login</button>
            </div>
        </form>

        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </div>

    <!-- Footer Section -->
    <footer>
        <div>
            <p>&copy; 2024 Walking W. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
