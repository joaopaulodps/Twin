<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Editar Produto</title>

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
                Editar Produto
            </h1>
            <!-- Mostra mensagem caso haja um ou mais campos vazios -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <li>Preencha todos os campos!</li>
                    </ul>
                </div>
            @endif
            <!-- Formulário de edição de produto -->
            <form action="{{'/produtos/update/'.$produto->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nome do Produto</label>
                    <input class="form-control" type="text" name="nome" value="{{$produto->nome}}">
                </div>
                <div class="form-group">
                    <label>Preço</label>
                    R$ <input class="form-control" type="number" name="preco" step="0.01" min="0.01" value="{{$produto->preco}}">
                </div>
                <div class="form-group">
                    <label>Categoria</label>
                    <select class="form-control mb-2" name="categoria">
                    <!-- Busca as categorias existentes, já vem selecionada a categoria escolhida no cadastro -->
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" 
                        <?php if($produto->categoria == $categoria->id) print 'selected' ?>>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                    </select>
                </div>
                <input class="btn btn-success" type="submit" value="Salvar">
            </form>
            <a href="/produtos" class="btn btn-danger mt-2">Voltar</a>
        </div>
    </body>
</html>