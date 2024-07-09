<?php
require_once('../class/config.php');
require_once('../autoload.php');


$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_cript = sha1($senha);


if (isset($_POST['Login'])) {

    if (!((empty($mail)) && (empty($senha)))) {

        $pessoa = new Pessoa();

        if ($pessoa->selecionarLogin($email, $senha_cript)) {
            $_SESSION['logado'] = true;
            $_SESSION['email'] = $email;
            header("location:nav.php");
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger w-75 ms-3" role="alert">
            Login inválido, tente novamente!
          </div>>';
            $_SESSION['erro2'] = 'ok';
            header("location:index.php");
        }
    } else {
        $_SESSION['erro2'] = 'ok';
        $_SESSION['msg'] = '<p class="erro">Preencha todos os campos!</p>';
        header("location:index.php");
    }
}