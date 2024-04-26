<?php
if (isset($_POST['enviar'])) {
    include "conecta.php";
    include "valida_arquivo.php";
    include "valida_form.php";

    $nomeImg =  $_FILES['picture']['name'];
    $tmp = $_FILES['picture']['tmp_name'];
    $path = "../img/";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $senha = $_POST['senha'];
    $senha_cript = sha1($_POST['senha']);




    if (validaForm($nome, $email, $senha)) {

        if (ValidaArq($_FILES['picture']['name'], $_FILES['picture']['size'])) {
            move_uploaded_file($tmp, $path . $nomeImg);

            $sql = $pdo->prepare("INSERT INTO pessoa(nome,email,data_nasc,senha,imagem) VALUES (?,?,?,?,?)");

            $sql->execute(array($nome, $email, $data, $senha_cript, $nomeImg));

            if ($sql) {
                echo "INSERÇÃO REALIZADA COM SUSSESSO!";
            } else {
                echo "HOUVE UM PROBLEMA PARA ARMAZENAR OS DADOS!";
            }
        }
    } else {
        echo "<br><br>HOUVE UM PROBLEMA PARA ARMAZENAR OS DADOS!";
    }
}
?>
<br><br><br>
<a href="cadastrar_usuario.php">Voltar</a><br>