<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Cliente</h1>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{ $cliente->nome }}" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" class="form-control" id="cpf" value="{{ $cliente->cpf }}" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" value="{{ $cliente->data_nascimento }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
