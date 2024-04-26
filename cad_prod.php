<?php
session_start();
if ((!isset($_SESSION['email'])) || (!$_SESSION['logado'])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto</title>
</head>

<body>
    <form action="inserir_prod.php" enctype="multipart/form-data" method="POST">

        <label for="nome">Nome do Produto :</label>
        <input type="text" name="nome" id="nome"><br><br>

        <label for="desc">Descrição do Produto :</label>
        <input type="text" name="desc" id="desc"><br><br>

        <label for="pic_prod">Upload de imagens</label>
        <input type="file" name="pic_prod" id="pic_prod"><br><br><br>

        <button type="submit" name="enviar">ENVIAR</button>
        <button type="reset">Reset</button>
    </form><br><br>
    <a href="./pessoa/nav.php">Voltar</a>

</body>

</html>