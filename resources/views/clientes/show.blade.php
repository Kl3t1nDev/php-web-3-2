<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Cliente</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Detalhes do Cliente</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nome: {{ $cliente->nome }}</h5>
                <p class="card-text">CPF: {{ $cliente->cpf }}</p>
                <p class="card-text">Data de Nascimento: {{ $cliente->data_nascimento }}</p>
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
