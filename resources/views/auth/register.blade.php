<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Basic Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header Styling - To position the logo at the top left */
        header {
            background-color: #2d9d63;
            padding: 0;
            position: relative;
        }

        header .logo {
            margin-left: 20px;
        }

        header .logo img {
            width: 100px; /* Adjust the size of the logo */
        }

        /* Container to center content */
        .container {
            width: 90%;
            margin: 0 auto;
            max-width: 600px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        /* Form Styling */
        form {
            margin-top: 20px;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            font-size: 1.1rem;
            margin-bottom: 5px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-top: 5px;
        }

        input:focus {
            outline: none;
            border-color: #f39c12;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2d9d63;
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #e67e22;
        }

        .error {
            color: red;
            font-size: 0.9rem;
        }

        p {
            text-align: center;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 15px;
            }

            /* Logo adjustment on small screens */
            header .logo img {
                width: 80px; /* Adjust logo size for smaller screens */
            }
        }
    </style>

    <!-- Link to external CSS file -->
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
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Input -->
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Input -->
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input -->
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Input -->
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div>
                <button type="submit">Register</button>
            </div>
        </form>

        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>

    <!-- Footer Section -->
    <footer>
        <div>
            <p>&copy; 2024 Walking W. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>