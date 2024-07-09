<?php
require_once('')
include  "./pessoa/conecta.php";
include "./pessoa/valida_arquivo.php";
include "valida_form_prod.php";

$nome = $_POST['nome'];
$desc = $_POST['desc'];
$img = $_FILES['pic_prod']['name'];
$tmp = $_FILES['pic_prod']['tmp_name'];

if (validaFormProd($nome, $desc)) {
    if (ValidaArq($img, $_FILES['pic_prod']['size'])) {
        move_uploaded_file($tmp, "img/" . $img);
        // $inserir = $pdo->prepare("INSERT INTO produto(nome,descricao,imagem) VALUES (?,?,?)");
        // $inserir->execute(array($nome, $desc, $img));
        // $pessoa = new 


        if ($inserir) {
            echo 'Dados inseridos com sussesso!';
        }
    }
} else {
    echo "Preencha todos os campos!";
}


?>
<br><br><a href='./Listagem_prod.php'>Voltar</a><br><br>
<a href="./pessoa/sair.php">SAIR</a>