<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Cliente</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Visualizar Cliente</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $cliente->id }}</td>
            </tr>
            <tr>
                <th>Nome</th>
                <td>{{ $cliente->nome }}</td>
            </tr>
            <tr>
                <th>CPF</th>
                <td>{{ $cliente->cpf }}</td>
            </tr>
            <tr>
                <th>Data de Nascimento</th>
                <td>{{ $cliente->data_nascimento }}</td>
            </tr>
        </table>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>
