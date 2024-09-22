<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/enviar-produto" method="POST">
        @csrf
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="{{ old('nome') }}"><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao">{{ old('descricao') }}</textarea><br><br>

        <label for="preco">Preço:</label><br>
        <input type="text" id="preco" name="preco" value="{{ old('preco') }}"><br><br>

        <label for="quantidade">Quantidade:</label><br>
        <input type="number" id="quantidade" name="quantidade" value="{{ old('quantidade') }}"><br><br>

        <label for="disponivel">Disponível:</label><br>
        <select id="disponivel" name="disponivel">
            <option value="1" {{ old('disponivel') == '1' ? 'selected' : '' }}>Sim</option>
            <option value="0" {{ old('disponivel') == '0' ? 'selected' : '' }}>Não</option>
        </select><br><br>

        <label for="data_lancamento">Data de Lançamento:</label><br>
        <input type="date" id="data_lancamento" name="data_lancamento" value="{{ old('data_lancamento') }}"><br><br>

        <label for="email_contato">Email de Contato:</label><br>
        <input type="email" id="email_contato" name="email_contato" value="{{ old('email_contato') }}"><br><br>

        <button type="submit">Enviar Produto</button>
    </form>

    @if (isset($produto))
        <h2>Produto Enviado:</h2>
        <ul>
            <li><strong>Nome:</strong> {{ $produto['nome'] }}</li>
            <li><strong>Descrição:</strong> {{ $produto['descricao'] ?? 'N/A' }}</li>
            <li><strong>Preço:</strong> R$ {{ number_format($produto['preco'], 2, ',', '.') }}</li>
            <li><strong>Quantidade:</strong> {{ $produto['quantidade'] }}</li>
            <li><strong>Disponível:</strong> {{ $produto['disponivel'] ? 'Sim' : 'Não' }}</li>
            <li><strong>Data de Lançamento:</strong> {{ \Carbon\Carbon::parse($produto['data_lancamento'])->format('d/m/Y') }}</li>
            <li><strong>Email de Contato:</strong> {{ $produto['email_contato'] }}</li>
        </ul>
    @endif
</body>
</html>
