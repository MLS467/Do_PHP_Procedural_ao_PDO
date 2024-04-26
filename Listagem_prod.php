<?php
include "./pessoa/conecta.php";

if ((!isset($_SESSION['email'])) or (!$_SESSION['logado'])) {
    header("location:pessoa/nav.php");
}


$select = $pdo->prepare("SELECT * FROM produto ORDER BY nome");
$select->execute();


while ($valores = $select->fetch()) {
    $imagem = $valores['imagem'];

?>


<form action="edicao_exclusao_prod.php" method="POST">
    <div
        style="width:40%;display:flex;justify-content:space-around;border:1px solid #ccc; border-radius:5px; padding:50px;flex-direction:column">
        <input type="hidden" name=cod value="<?php echo $valores['codproduto'] ?>">

        <img style="width:100px; height:100px; margin-bottom: 3%;" src='<?php echo "img/$imagem" ?>' alt=" foto da
            produto">

        <label for="nome">Nome do Produto :</label>
        <input type="text" name="nome" id="nome" value="<?php echo $valores['nome'] ?>"><br>

        <label for="desc">Descrição do Produto :</label>
        <input type="text" name="desc" id="desc" value="<?php echo $valores['descricao'] ?>">

        <div style="margin-top: 3%;">
            <button type="submit" name="editar">Editar</button>
            <button type="submit" name="excluir">Excluir</button>
        </div>
    </div>
</form><br><br>


<?php
} ?>

<a href="./pessoa/nav.php">Voltar</a>