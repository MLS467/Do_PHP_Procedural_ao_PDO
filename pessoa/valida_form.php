<?php

function validaForm($nome, $email, $senha)
{

    $controle = true;

    if ((!empty($nome)) and (!empty($email)) and (!empty($senha))) {

        if (!preg_match("/^[a-zA-Zá-ú ]+$/", $nome)) {
            echo "Digite apenas letras e espaços!";
            $controle = false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email inválido!";
            $controle = false;
        }

        if (strlen($senha) < 4) {
            echo "Senha pequena, no mínimo 5 caracteres!";
            $controle = false;
        }

        return $controle;
    } else {
        echo "PREENCHA TODOS OS CAMPOS";
    }
}