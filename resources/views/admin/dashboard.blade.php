<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
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
            background: #dc3545;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 1.6rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 1rem;
            font-weight: bold;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .menu-links {
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }

        .menu-links a {
            display: block;
            width: 250px;
            text-align: center;
            padding: 0.9rem 1.2rem;
            background: white;
            border-radius: 8px;
            text-decoration: none;
            border: 1px solid #ddd;
            font-weight: bold;
            color: #333;
            font-size: 1rem;
            transition: 0.2s ease;
        }

        .menu-links a:hover {
            background: #f8f9fa;
            border-color: #bbb;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <h1>⚙️ Painel Administrativo</h1>

        <div>
            <a href="{{ route('logout') }}">Sair</a>
        </div>
    </nav>

    <div class="container">

        <div class="card">
            <h2 style="text-align:center; margin-bottom: 1rem;">Menu do Administrador</h2>

            <div class="menu-links">
                <!-- LINK ESTILIZADO DE GERENCIAR USUÁRIOS -->
                <a href="{{ route('admin.users') }}">👥 Gerenciar Usuários</a>

                <!-- Adicione outros itens se quiser -->
                <!-- <a href="#">📦 Gerenciar Produtos</a> -->
                <!-- <a href="#">📄 Relatórios</a> -->
            </div>
        </div>

    </div>

</body>

</html>
