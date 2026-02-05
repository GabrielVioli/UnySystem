<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar produto</title>
</head>
<body>
    <header>
        <h1>Criar produto</h1>
    </header>

    <main>
        <form action="/produto/store" method="POST">

            @csrf
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="name" required><br><br>

            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="description" required><br><br>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="price" step="0.01" required><br><br>

            <button type="submit">Criar Produto</button>
        </form>
    </main>

    <footer>
        <p>criado por Gabriel Vinicius de Oliveira</p>
    </footer>

</body>
</html>