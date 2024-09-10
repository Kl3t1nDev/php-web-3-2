<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamentos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Orçamentos</h1>
        <a href="{{ route('orcamentos.create') }}">Criar Novo Orçamento</a>
        <form method="GET" action="{{ route('orcamentos.index') }}">
            <input type="text" name="search" placeholder="Buscar por KWp, Orientação, Instalação ou Preço..." value="{{ request('search') }}">
            <button type="submit">Pesquisar</button>
        </form>
        <a href="{{ url('/') }}">Voltar para a Página Inicial</a>
        <table>
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
                                <a href="{{ asset('storage/' . $orcamento->arquivo) }}" target="_blank">Visualizar</a>
                            @else
                                Nenhum arquivo
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('orcamentos.edit', $orcamento->id) }}">Editar</a>
                            <form action="{{ route('orcamentos.destroy', $orcamento->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orcamentos->links() }}
    </div>
</body>
</html>
