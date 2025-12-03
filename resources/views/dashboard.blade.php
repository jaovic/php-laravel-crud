<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .navbar {
            background: #007bff;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 1.5rem;
        }

        .navbar form {
            margin: 0;
        }

        .navbar button {
            background: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
        }

        .navbar button:hover {
            background: #c82333;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .info {
            background: #d1ecf1;
            color: #0c5460;
            padding: 1rem;
            border-radius: 4px;
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <h1>Dashboard</h1>
        <div>
            <span>Olá, {{ Auth::user()->name }}!</span>
            @if(Auth::user()->isAdmin())
            <span style="background: #ffc107; color: #000; padding: 0.25rem 0.5rem; border-radius: 4px; margin: 0 1rem;">Admin</span>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit">Sair</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <h2>Bem-vindo ao Sistema!</h2>
            <p style="margin-top: 1rem;">Você está autenticado e pode acessar esta área protegida.</p>

            <div class="info">
                <strong>Suas informações:</strong><br>
                Nome: {{ Auth::user()->name }}<br>
                E-mail: {{ Auth::user()->email }}<br>
                Função: {{ Auth::user()->role }}
            </div>

            @if(Auth::user()->isAdmin())
            <p style="margin-top: 1rem;">
                <a href="{{ route('admin.dashboard') }}" style="color: #007bff;">Acessar Painel Administrativo</a>
            </p>
            @endif
        </div>
    </div>
</body>

</html>
