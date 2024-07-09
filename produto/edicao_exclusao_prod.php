<?php
require_once('../autoload.php');
require_once('../class/Produto.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['desc'];
$valor = $_POST['valor'];

if (isset($_POST['editar'])) {


    $produto = new Produto($nome, $descricao, null, $valor);

    if ($produto->atualizarDados($id)) {
        echo "Atualização feita com sucesso!";
    }
} else if (isset($_POST['excluir'])) {

    $produto = new Produto();

    if ($produto->deletarUmRegistro($id)) {
        echo "Excluído feita com sucesso!";
    }
} ?>
<br><br><br>
<a href="./Listagem_prod.php">Voltar</a>


<!-- // Caminho para o arquivo de imagem
$caminhoImagem = 'caminho/para/sua/imagem.jpg';

// Verifica se o arquivo existe antes de tentar apagar
if (file_exists($caminhoImagem)) {
    // Tenta apagar o arquivo
    if (unlink($caminhoImagem)) {
        echo "Imagem apagada com sucesso.";
    } else {
        echo "Erro ao tentar apagar a imagem.";
    }
} else {
    echo "Imagem não encontrada.";
} -->