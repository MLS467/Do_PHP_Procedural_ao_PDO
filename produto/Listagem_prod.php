<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Example</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/listagemProd.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div id="caixa" class="container-fluid">
        <div class="row w-100 pai">
            <?php
            require_once('../class/config.php');
            require_once('../autoload.php');

            if ((!isset($_SESSION['email'])) or (!$_SESSION['logado'])) {
                header("location:../pessoa/nav.php");
            }

            $produtos = new Produto();
            $res = $produtos->selecionarTodosRegistros();
            ?>

            <?php foreach ($res as $key => $valores) {
                $imagem = $valores['imagem'];
            ?>

            <div class="col-md-3 mb-4 ">
                <form action="edicao_exclusao_prod.php" method="POST">
                    <div class="card">
                        <img id="img" src='<?php echo "../img/$imagem"; ?>' class="card-img-top" alt="foto do produto">
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo $valores['id'] ?>">
                            <input type="hidden" name="imgVelha" value="<?php echo "img/$imagem"; ?>">

                            <div class="form-group">
                                <label for="nome">Nome do Produto:</label>
                                <input class="form-control" type="text" name="nome" id="nome"
                                    value="<?php echo $valores['nome']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="desc">Descrição do Produto:</label>
                                <input class="form-control" type="text" name="desc" id="desc"
                                    value="<?php echo $valores['descricao']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="valor">Valor do Produto R$:</label>
                                <input class="form-control" type="number" name="valor" id="valor" step="0.01" min="0"
                                    value="<?php echo  $valores['valor']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="quantidade">Quantidade:</label>
                                <input class="form-control" type="number" name="quantidade" id="quantidade" step="1"
                                    min="1" value="1">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-success" name="addCarrinho">Adc ao Carrinho</button>
                            <button type="submit" class="btn btn-warning" name="editar">Editar</button>
                            <button type="submit" class="btn btn-danger" name="excluir">Excluir</button>
                        </div>
                    </div>
                </form>
            </div>

            <?php } ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<a href="../pessoa/nav.php">Voltar</a>