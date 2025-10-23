<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supermercado</title>

    {{-- Fuente y estilos básicos --}}
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #f1f5f9;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #3b82f6;
        }

        p {
            color: #cbd5e1;
            font-size: 1.1rem;
        }

        .buttons {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        a {
            text-decoration: none;
            font-weight: 600;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            transition: 0.2s;
        }

        .btn-login {
            background-color: #2563eb;
            color: white;
        }

        .btn-login:hover {
            background-color: #1d4ed8;
        }

        .btn-register {
            border: 2px solid #2563eb;
            color: #2563eb;
        }

        .btn-register:hover {
            background-color: #2563eb;
            color: white;
        }

        footer {
            position: absolute;
            bottom: 15px;
            color: #64748b;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🛒 Supermercado</h1>
        <p>Bienvenido al sistema de gestión y ventas</p>

        <div class="buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-login">Ir al Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn-login">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-register">Registrarse</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <footer>© {{ date('Y') }} Supermercado - Todos los derechos reservados</footer>
</body>
</html>
