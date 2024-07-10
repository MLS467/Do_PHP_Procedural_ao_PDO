<?php
require_once('config.php');
require_once('Pessoa.php');
require_once('Produto.php');
require_once('Db.php');
require_once('Crud.php');

class Carrinho
{
    private ?string $nomeTabela = null;
    private ?array $pessoa = null;
    private ?int $id = null;

    public function __construct($pessoa)
    {
        $this->nomeTabela = 'carrinho';
        $this->pessoa = $pessoa;
    }

    public function AdicionarParaCarrinho(array $produto, $qtd)
    {

        $sql = "INSERT INTO $this->nomeTabela VALUES (null,?,?,?,?,?,?)";
        $query = Db::preparar($sql);
        $query->execute(array($produto['nome'], $qtd, $produto['valor'], $produto['valor'] * $qtd, $this->pessoa['nome'], $this->pessoa['id']));

        if (!$query) {
            return false;
        }
    }


    public function mostrarItensCarrinho()
    {
        $sql = "SELECT * FROM $this->nomeTabela ORDER BY nome_prod";
        $query = Db::preparar($sql);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        // print_r($this->somarValores());
        // $this->contagemDeItens();
        return $res;
    }


    private function somarValores()
    {
        $sql = "SELECT SUM(valor_total) as soma FROM $this->nomeTabela WHERE id_usuario=?";
        $query = Db::preparar($sql);
        $query->execute(array($this->pessoa['id']));
        $res = $query->fetch(PDO::FETCH_ASSOC);
        $valorTotal = number_format($res['soma'], 2, '.', '');
        return $valorTotal;
    }

    private function contagemDeItens()
    {
        $sql = "SELECT SUM(qtd_prod) as contagem FROM $this->nomeTabela WHERE id_usuario=?";
        $query = Db::preparar($sql);
        $query->execute(array($this->pessoa['id']));
        $res = $query->fetch(PDO::FETCH_ASSOC);
        echo "<pre>";
        print_r($res['contagem']);
        echo "</pre>";
        // return $res['contagem'];
    }
}