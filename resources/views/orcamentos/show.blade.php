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
            <tr>
                <th>Arquivo</th>
                <td>
                    @if ($orcamento->arquivo)
                        <a href="{{ asset('storage/' . $orcamento->arquivo) }}" target="_blank">
                            <img src="{{ asset('storage/' . $orcamento->arquivo) }}" alt="Arquivo" style="max-width: 200px; max-height: 200px;">
                        </a>
                        <br>
                        <a href="{{ asset('storage/' . $orcamento->arquivo) }}" download>Baixar Arquivo</a>
                    @else
                        Nenhum arquivo disponível
                    @endif
                </td>
            </tr>
        </table>
        <a href="{{ route('orcamentos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>
