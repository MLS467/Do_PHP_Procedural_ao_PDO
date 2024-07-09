<?php
require_once('Crud.php');
require_once('Validacao.php');

class Pessoa extends Crud
{
    private $nome  = null;
    private $email = null;
    private $data_nasc = null;
    private $senha = null;
    private $imagem = null;
    private ?Validacao $validar = null;


    public function __construct(string $nome = '', string $email = '', string $data_nasc = '', string $senha = '', string $imagem = '')
    {
        $this->nomeTabela = 'Pessoa';
        $this->nome = $nome;
        $this->email = $email;
        $this->data_nasc = $data_nasc;
        $this->senha = $senha;
        $this->imagem = $imagem;
        $this->validar = new Validacao;
    }

    function inserirDados()
    {
        if ($this->validar->validaForm($this->nome, $this->email, $this->senha)) {

            $sql = "INSERT INTO $this->nomeTabela VALUES  (null,?,?,?,?,?)";
            $query = Db::preparar($sql);
            $query->execute(
                array(
                    $this->nome,
                    $this->email,
                    $this->data_nasc,
                    $this->senha,
                    $this->imagem
                )
            );

            if (!$query)
                return 0;
            return 1;
        } else {
            return 0;
        }
    }

    function atualizarDados($id)
    {
        if ($this->validar->validaForm($this->nome, $this->email, $this->senha)) {


            $sql = "UPDATE $this->nomeTabela SET 
        nome=?,
        email =?,
        data_nasc=?,
        senha = ?,
        imagem = ?
        WHERE id = ? 
        ";
            $query = self::preparar($sql);
            $query->execute(
                [
                    $this->nome,
                    $this->email,
                    $this->data_nasc,
                    $this->senha,
                    $this->imagem,
                    $id
                ]
            );

            if (!$query)
                return 0;
            return 1;
        } else {
            return 0;
        }
    }
}