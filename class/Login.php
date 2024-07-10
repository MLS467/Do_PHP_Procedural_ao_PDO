<?php
require_once('Db.php');
require_once('Validacao.php');


class Login extends Db
{
    private ?Validacao $validar = null;

    public function __construct(private $email, private $senhaCript, private $senha, private $nomeTabela = 'pessoa')
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->senhaCript = $senhaCript;
        $this->validar = new Validacao();
    }


    public function selecionarLogin()
    {
        if ($this->validar->validarLogin($this->email, $this->senha)) {
            $sql = "SELECT * FROM $this->nomeTabela WHERE email = ? AND senha = ?";
            $query = self::preparar($sql);
            $query->execute(array($this->email, $this->senhaCript));
            $res = $query->fetch(PDO::FETCH_ASSOC);
            if (!$res)
                return false;
            return $res;
        } else {
            return false;
        }
    }
}