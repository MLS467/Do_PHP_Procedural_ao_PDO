<?php
include "conecta.php";


$nome = $_POST['pesquisa'];


$select = $pdo->prepare('SELECT * FROM pessoa WHERE nome LIKE "%"?"%"');
$select->execute(array($nome));


while ($dados = $select->fetch()) {
?>
<label for="res">Usuario :</label>
<input style="width:800px" id="res" type="text"
    value="<?php echo "NOME: " . $dados['nome'] . " | " . "DESCRICAO: " . $dados['email'] . " | " . "Email: " . $dados['email'] . " | " . "Data_Nascimento" . $dados['data_nasc'] ?> "><br><br><br>

<?php
};
?>