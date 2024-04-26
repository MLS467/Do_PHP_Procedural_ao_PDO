<?php
include "conecta.php";
include "valida_arquivo.php";
include "valida_form.php";

$img = $_FILES['img']['name'];
$img_tmp = $_FILES['img']['tmp_name'];
$img_tam = $_FILES['img']['size'];

$codpes = $_POST['codpessoa'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$data = $_POST['data'];
$senha = $_POST['senha'];

if (isset($_POST['excluir'])) {

    $res = $pdo->prepare("DELETE FROM pessoa WHERE codpessoa =?");
    $res->execute(array($codpes));

    if ($res) {
        echo "EXCLUSÃO REALIZADA COM SUSSESSO!";
    }
} else {
    if (isset($_POST['editar'])) {
        $path = "../img/";
        if (validaForm($nome, $email, $senha)) {
            if (ValidaArq($img, $img_tam)) {

                $senha_cript = sha1($senha);

                move_uploaded_file($img_tmp, $path . $img);

                $res = $pdo->prepare("UPDATE pessoa SET nome=?, email= ?, data_nasc=?, senha=?, imagem = ? WHERE codpessoa = ?");

                $res->execute(array($nome, $email, $data, $senha_cript, $img, $codpes));
            }

            if ($res) {
                echo "EDIÇÃO REALIZADA COM SUSSESSO!";
            }
        }
    }
}

?>
<br><br><br>
<a href="listagem.php">Voltar</a><br>