<?php
require_once('../class/config.php');
require_once('../autoload.php');

if ((!isset($_SESSION['email'])) or (!$_SESSION['logado'])) {
    header("location:../pessoa/nav.php");
}

$produtos = new Produto();
$res = $produtos->selecionarTodosRegistros();


foreach ($res as $key => $valores) {
    $imagem = $valores['imagem'];

?>


<form action="edicao_exclusao_prod.php" method="POST">
    <div
        style="width:40%;display:flex;justify-content:space-around;border:1px solid #ccc; border-radius:5px; padding:50px;flex-direction:column">
        <input type="hidden" name="id" value="<?php echo $valores['id'] ?>">

        <img style="width:100px; height:100px; margin-bottom: 3%;" src='<?php echo "../img/$imagem"; ?>' alt=" foto da
            produto">

        <input type="hidden" name="imgVelha" id="" value="<?php echo "img/$imagem"; ?>">

        <label for="nome">Nome do Produto :</label>
        <input type="text" name="nome" id="nome" value="<?php echo $valores['nome']; ?>"><br>

        <label for="desc">Descrição do Produto :</label>
        <input type="text" name="desc" id="desc" value="<?php echo $valores['descricao']; ?>"><br>


        <label for="valor">Valor do produto R$:</label>
        <input type="number" name="valor" id="valor" step="0.01" min="0" value="<?php echo  $valores['valor']; ?>">

        <div style="margin-top: 3%;">
            <button type="submit" name="editar">Editar</button>
            <button type="submit" name="excluir">Excluir</button>
        </div>
    </div>
</form><br><br>


<?php
} ?>

<a href="../pessoa/nav.php">Voltar</a>