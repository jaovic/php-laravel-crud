<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Produtos</title>

    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 15px;
        }

        .btn:hover {
            background: #1e40af;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        table th {
            background: #111827;
            color: white;
            padding: 12px;
            text-align: left;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f9fafb;
        }

        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        /* Ícones */
        .icon-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
        }

        .icon-btn:hover svg {
            transform: scale(1.15);
        }

        .icon-btn svg {
            transition: 0.15s ease;
        }

        /* --- MODAL --- */
        .modal-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal {
            background: white;
            width: 350px;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .modal h3 {
            margin-bottom: 10px;
        }

        .modal p {
            margin-bottom: 20px;
        }

        .modal-buttons {
            display: flex;
            justify-content: space-between;
        }

        .btn-cancel {
            background: #6b7280;
            padding: 8px 14px;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            border: none;
        }

        .btn-cancel:hover {
            background: #4b5563;
        }

        .btn-confirm {
            background: #dc2626;
            padding: 8px 14px;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            border: none;
        }

        .btn-confirm:hover {
            background: #b91c1c;
        }
    </style>
</head>

<body>

    <div class="top-bar">
        <h1>Produtos</h1>
        <a class="btn" href="{{ route('produtos.create') }}">Novo Produto</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>

        @foreach ($produtos as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>R$ {{ $p->preco }}</td>
            <td>{{ $p->quantidade }}</td>
            <td>
                <div class="actions">

                    <!-- Ícone Editar -->
                    <button class="icon-btn" onclick="window.location='{{ route('produtos.edit', $p->id) }}';">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#1d4ed8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                    </button>

                    <!-- Ícone Excluir -->
                    <button class="icon-btn" onclick="openModal(this)" data-id="{{ $p->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#dc2626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                            <line x1="10" y1="11" x2="10" y2="17"/>
                            <line x1="14" y1="11" x2="14" y2="17"/>
                        </svg>
                    </button>

                    <form id="form-delete-{{ $p->id }}" action="{{ route('produtos.destroy', $p->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                    </form>

                </div>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- MODAL -->
    <div id="modal-bg" class="modal-bg">
        <div class="modal">
            <h3>Confirmar exclusão</h3>
            <p>Tem certeza que deseja excluir este produto?</p>

            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
                <button class="btn-confirm" id="btn-confirm">Excluir</button>
            </div>
        </div>
    </div>

    <script>
        let deleteId = null;

        function openModal(button) {
            deleteId = button.getAttribute("data-id");
            document.getElementById("modal-bg").style.display = "flex";
        }

        function closeModal() {
            deleteId = null;
            document.getElementById("modal-bg").style.display = "none";
        }

        document.getElementById("btn-confirm").addEventListener("click", function () {
            if (deleteId) {
                document.getElementById("form-delete-" + deleteId).submit();
            }
        });
    </script>

</body>

</html>
