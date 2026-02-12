<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>

    <p> Nome: {{ $user->name}} </p>
    <p> Email: {{ $user->email}} </p>
    <p> ID: {{ $user->id }}</p>
    <p> Criado em: {{ $user->created_at }}</p>
    <p> Ultima atualização: {{ $user->updated_at }}</p>
    <p> Verificado em: {{ $user->email_verified_at }}</p>

</body>
</html>
