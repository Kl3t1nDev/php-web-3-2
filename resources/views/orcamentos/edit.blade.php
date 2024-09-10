<!DOCTYPE html>
<html>
<head>
    <title>Editar Orçamento</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Orçamento</h1>
        <form action="{{ route('orcamentos.update', $orcamento->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" class="form-control" id="cliente_id" required>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $orcamento->cliente_id == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kwp">KWp</label>
                <input type="text" name="kwp" class="form-control" id="kwp" value="{{ $orcamento->kwp }}" required>
            </div>
            <div class="form-group">
                <label for="orientacao">Orientação</label>
                <input type="text" name="orientacao" class="form-control" id="orientacao" value="{{ $orcamento->orientacao }}" required>
            </div>
            <div class="form-group">
                <label for="instalacao">Instalação</label>
                <input type="text" name="instalacao" class="form-control" id="instalacao" value="{{ $orcamento->instalacao }}" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" name="preco" class="form-control" id="preco" value="{{ $orcamento->preco }}" required>
            </div>
            <div>
                <label for="arquivo">Arquivo</label>
                <input type="file" id="arquivo" name="arquivo">
                @if($orcamento->arquivo)
                    <p>Arquivo Atual: <a href="{{ asset('storage/' . $orcamento->arquivo) }}" target="_blank">Visualizar</a></p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('orcamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
