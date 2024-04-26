<?php

function ValidaArq($imgExt, $imgTam)
{
    $controle = true;

    if ((!empty($imgExt)) && (!empty($imgTam))) {
        $tamanhoMax = "2e+6";
        if ($imgTam > $tamanhoMax) {
            $controle = false;
            echo "a img é muito grande.";
        }


        $extSet = [".jpg", ".jpeg", ".png"];
        $extensao = strrchr($imgExt, ".");
        if (!in_array($extensao, $extSet)) {
            $controle = false;
            echo "o tipo do aquivo não é aceito.";
        }
    } else {
        $controle = false;
        echo "INSIRA UMA IMAGEM!";
    }

    return $controle;
}