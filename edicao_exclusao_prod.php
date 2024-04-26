<?php
include "./pessoa/conecta.php";


$cod = $_POST['cod'];
$nome = $_POST['nome'];
$descricao = $_POST['desc'];



if (isset($_POST['editar'])) {

    $update = $pdo->prepare("UPDATE produto SET nome = ?,descricao=? WHERE codproduto = ?");
    $update->execute(array($nome, $descricao, $cod));

    if ($res) {
        echo "Atualização feita com sucesso!";
    }
} else if (isset($_POST['excluir'])) {

    $delete = $pdo->prepare("DELETE FROM produto WHERE codproduto =?");
    $delete->execute(array($cod));

    if ($delete) {
        echo "Excluído feita com sucesso!";
    }
} ?>
<br><br><br>
<a href="./Listagem_prod.php">Voltar</a>