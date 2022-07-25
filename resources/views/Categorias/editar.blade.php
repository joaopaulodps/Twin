<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Editar Categoria</title>

    </head>
    <body>
        <!-- Barra de navegação entre os CRUDs -->
        <nav class="d-flex justify-content-between" style="width:100%; background-color:#00008B; padding: 10px 40px 0 20px">
            <h3 style="font-weight: bold; color:#fff">Controle de Produtos</h3>
            <div>
                <a class="btn btn-light mb-2" href="/categorias">Categorias</a>
                <a class="btn btn-light mb-2" href="/produtos">Produtos</a>
            </div>
        </nav>
        <div class="container">
            <h1>
                Editar Categoria
            </h1>
            <!-- Mostra mensagem caso o campo esteja vazio -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <li>Preencha todos os campos!</li>
                    </ul>
                </div>
            @endif
            <!-- Formulário de edição de categoria -->
            <form action="{{'/categorias/update/'.$categoria->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nome da Categoria</label>
                    <input class="form-control mb-2" type="text" name="nome" value="{{$categoria->nome}}">
                    <input class="btn btn-success" type="submit" value="Salvar">
                </div>
            </form>
            <a href="/categorias" class="btn btn-danger mt-2">Voltar</a>
        </div>
    </body>
</html>