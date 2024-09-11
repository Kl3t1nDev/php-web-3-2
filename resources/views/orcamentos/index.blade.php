<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamentos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Orçamentos</h1>
        <div class="mb-3">
            <a href="{{ route('orcamentos.create') }}" class="btn btn-primary">Criar Novo Orçamento</a>
            <a href="{{ url('/clientes') }}" class="btn btn-secondary">Ir para Clientes</a>
        </div>
        <form method="GET" action="{{ url('/orcamentos') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por KWp, Orientação, Instalação ou Preço..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary">Pesquisar</button>
                </div>
            </div>
        </form>
        @if ($orcamentos->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>KWp</th>
                        <th>Orientação</th>
                        <th>Instalação</th>
                        <th>Preço</th>
                        <th>Cliente</th>
                        <th>Arquivo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orcamentos as $orcamento)
                        <tr>
                            <td>{{ $orcamento->id }}</td>
                            <td>{{ $orcamento->kwp }}</td>
                            <td>{{ $orcamento->orientacao }}</td>
                            <td>{{ $orcamento->instalacao }}</td>
                            <td>{{ $orcamento->preco }}</td>
                            <td>{{ $orcamento->cliente->nome }}</td>
                            <td>
                                @if($orcamento->arquivo)
                                    <a href="{{ asset('storage/' . $orcamento->arquivo) }}" class="btn btn-info btn-sm" target="_blank">Visualizar</a>
                                @else
                                    Nenhum arquivo
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('orcamentos.show', $orcamento->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                                <a href="{{ route('orcamentos.edit', $orcamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('orcamentos.destroy', $orcamento->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orcamentos->links() }}
        @else
            <p>Nenhum orçamento encontrado.</p>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
