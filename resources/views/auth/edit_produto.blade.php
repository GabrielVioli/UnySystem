<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
</head>
<body>
    <h1>Editar produto</h1>
    <form action="/produto/{{ $produto->id }}/update" method="POST">
        @csrf
        @method('PUT')

        <p>{{ $produto->name }}</p>
        <p>{{ $produto->description }}</p>
        <p>{{ $produto->price }}</p>

        <label for="nome">Novo nome:</label>
        <input type="text" id="nome" name="name" value="{{ $produto->name }}" required><br><br>

        <label for="descricao">Nova descrição:</label>
        <input type="text" id="descricao" name="description" value="{{ $produto->description }}" required><br><br>

        <label for="preco">Novo preço:</label>
        <input type="number" id="preco" name="price" step="0.01" value="{{ $produto->price }}" required><br><br>

        <button type="submit">Atualizar Produto</button>
    </form>
</body>
</html>