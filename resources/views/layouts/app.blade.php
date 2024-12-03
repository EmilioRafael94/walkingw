<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Walking W</title>

    <!-- Google Fonts for a modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Header Section -->
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('images/WALKING W LOGO.png') }}" alt="Walking W Logo">
                    </a>
                </div>

                <!-- Navigation Links (Centered) -->
                <ul class="nav-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/product">Products</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/about">About</a></li>
                </ul>

                <!-- Auth, Cart, and Search Icons (Right) -->
                <div class="auth-cart-search">
                    <ul>
                        <li><a href="/cart">🛒</a></li>
                        <li>
                            @if(Auth::check())
                                <a href="/logout">Logout</a>
                            @else
                                <a href="/login">Login</a> | <a href="/register">Sign Up</a>
                            @endif
                        </li>
                        <li><a href="/search">🔍</a></li> <!-- Search Icon -->
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content Area -->
    <main>
        @yield('content') <!-- Content for specific pages -->
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Walking W. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
