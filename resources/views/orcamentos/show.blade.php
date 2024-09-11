<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Orçamento</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Detalhes do Orçamento</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">KWp: {{ $orcamento->kwp }}</h5>
                <p class="card-text">Orientação: {{ $orcamento->orientacao }}</p>
                <p class="card-text">Instalação: {{ $orcamento->instalacao }}</p>
                <p class="card-text">Preço: {{ $orcamento->preco }}</p>
                <p class="card-text">Cliente: {{ $orcamento->cliente->nome }}</p>
                @if($orcamento->arquivo)
                    <p class="card-text">Arquivo: <a href="{{ asset('storage/' . $orcamento->arquivo) }}" target="_blank">Visualizar</a></p>
                @endif
                <a href="{{ route('orcamentos.edit', $orcamento) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('orcamentos.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
