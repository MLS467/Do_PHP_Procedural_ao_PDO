<?php
require_once('../autoload.php');
require_once('../class/Carrinho.php');

$idUsuario = $_SESSION['id'];
$idProduto = $_SESSION['idProd'];
$qtd = $_SESSION['quantidade'];

$pessoa = new Pessoa();
$novaPessoa = $pessoa->selecionarUmRegistro($idUsuario);

$produto = new Produto();
$novoProduto = $produto->selecionarUmRegistro($idProduto);


$carrinho = new Carrinho($novaPessoa);
$carrinho->AdicionarParaCarrinho($novoProduto, $qtd);
// $carrinho->mostrarItensCarrinho();
header('location:../produto/listagem_prod.php');