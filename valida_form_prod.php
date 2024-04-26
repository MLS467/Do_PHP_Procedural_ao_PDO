<?php

function validaFormProd($nome, $descricao)
{
    $controle = true;


    if (empty($nome) || empty($descricao)) {
        $controle = false;
    }

    return $controle;
}