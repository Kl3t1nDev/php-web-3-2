<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Orçamento</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Visualizar Orçamento</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $orcamento->id }}</td>
            </tr>
            <tr>
                <th>Cliente</th>
                <td>{{ $orcamento->cliente->nome }}</td>
            </tr>
            <tr>
                <th>KWp</th>
                <td>{{ $orcamento->kwp }}</td>
            </tr>
            <tr>
                <th>Orientação</th>
                <td>{{ $orcamento->orientacao }}</td>
            </tr>
            <tr>
                <th>Instalação</th>
                <td>{{ $orcamento->instalacao }}</td>
            </tr>
            <tr>
                <th>Preço</th>
                <td>{{ $orcamento->preco }}</td>
            </tr>
        </table>
        <a href="{{ route('orcamentos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>
