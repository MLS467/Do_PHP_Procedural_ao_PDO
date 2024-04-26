<?php
include "pessoa/conecta.php";

$nome = $_POST['produto'];


$sql = $pdo->prepare('SELECT * FROM produto WHERE nome LIKE "%"?"%"');
$sql->execute(array($nome));

while ($dados = $sql->fetch()) {

?>

<label for="res">Produto :</label>
<input style="width:500px" id="res" type="text"
    value="<?php echo "NOME: " . $dados['nome'] . "  " . "DESCRICAO: " . $dados['descricao'] ?> "><br><br><br>

<?php
}
?>