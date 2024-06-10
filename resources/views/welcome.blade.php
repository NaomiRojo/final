<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Styles -->
    <style>
        body {
            background-image: url('images/—Pngtree—spacious and 3d e commerce_4051778.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .links {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-direction: column;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .links a {
            font-weight: bold;
            text-decoration: none;
            color: #333;
            padding: 15px 30px;
            border-radius: 30px;
            transition: background-color 0.3s;
            background-color: #f0f0f0;
            border: 2px solid transparent;
        }

        .links a:hover {
            background-color: #e0e0e0;
        }

        .welcome-message {
            margin-bottom: 20px;
            font-size: 20px;
            color: #555;
        }

        .register-link {
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .register-link:hover {
            color: #0056b3;
        }
    </style>
</head>

<body class="antialiased">
    <div class="links">
        <p class="welcome-message">¡Bienvenido a nuestra tienda! Por favor, regístrate o inicia sesión para acceder al catálogo.</p>
        @if (Route::has('login'))
        @auth
        <a href="{{ url('/shop') }}">TIENDA</a>
        <a href="{{ url('/dashboard') }}">Sesión</a>
        @else
        <a href="{{ route('login') }}">Iniciar sesión</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="register-link">Registrarse</a>
        @endif
        @endauth
        @endif
    </div>
</body>

</html>
