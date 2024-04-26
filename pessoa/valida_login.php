<?php

$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_cript = sha1($senha);


if (isset($_POST['Login'])) {

    if (!((empty($mail)) && (empty($senha)))) {
        include "conecta.php";

        $sql = $pdo->prepare("SELECT * FROM pessoa WHERE email=? and senha=?");
        $sql->execute(array($email, $senha_cript));
        $res = $sql->fetchAll();

        if (count($res) == 1) {
            $_SESSION['logado'] = true;
            $_SESSION['email'] = $email;
            header("location:nav.php");
        } else {
            $_SESSION['msg'] = '<p class="erro">Login inválido, tente novamente!</p>';

            header("location:index.php");
        }
    } else {
        $_SESSION['erro2'] = 'ok';
        $_SESSION['msg'] = '<p class="erro">Preencha todos os campos!</p>';
        header("location:index.php");
    }
}