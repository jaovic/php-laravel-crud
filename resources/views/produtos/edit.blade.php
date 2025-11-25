<h1>Editar Produto</h1>

<style>
    body {
        margin: 0;
        padding: 20px;
        font-family: Arial, sans-serif;
        background: #f3f4f6;
    }

    h1 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    .card {
        background: white;
        padding: 25px;
        max-width: 450px;
        margin: 0 auto;
        border-radius: 10px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #374151;
    }

    input {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
        font-size: 15px;
    }

    input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 3px rgba(37, 99, 235, 0.4);
    }

    .btn-save {
        background: #2563eb;
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 6px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        margin-top: 10px;
    }

    .btn-save:hover {
        background: #1e40af;
    }

    .back-link {
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        color: #374151;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>

<div class="card">

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" value="{{ $produto->nome }}" required>
        </div>

        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="preco" value="{{ $produto->preco }}" required>
        </div>

        <div class="form-group">
            <label>Quantidade</label>
            <input type="number" name="quantidade" value="{{ $produto->quantidade }}" required>
        </div>

        <button class="btn-save" type="submit">Salvar</button>
    </form>

    <a class="back-link" href="{{ route('produtos.index') }}">← Voltar</a>

</div>
