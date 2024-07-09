<?php
require_once('Validacao.php');
require_once('Crud.php');

class Produto extends Crud
{
    private ?Validacao $validar = null;

    public function __construct(
        private ?string $nome = null,
        private ?string $descricao = null,
        private ?string $imagem = null,
        private ?float $valor = 0.0
    ) {
        $this->validar = new Validacao();
        $this->nomeTabela = 'produto';
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->valor = $valor;
    }

    public function inserirDados()
    {
        if ($this->validar->validarProd($this->nome, $this->descricao, $this->valor)) {

            $sql = "INSERT INTO $this->nomeTabela VALUES  (null,?,?,?,?)";
            $query = Db::preparar($sql);
            $query->execute(
                array(
                    $this->nome,
                    $this->descricao,
                    $this->imagem,
                    $this->valor
                )
            );

            if ($query) {
                return true;
            } else {
                return false;
            }
        } else
            return false;
    }

    public function atualizarDados($id)
    {
        if ($this->validar->validarProd($this->nome, $this->descricao, $this->valor)) {

            $sql = "UPDATE $this->nomeTabela SET nome=?,descricao =?,imagem =?, valor=? WHERE id = ?";
            $query = Db::preparar($sql);
            $query->execute(array($this->nome, $this->descricao, $this->imagem, $this->valor, $id));
            if ($query)
                return true;
            else
                return false;
        }
    }
}