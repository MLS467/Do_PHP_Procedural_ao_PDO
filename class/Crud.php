<?php
require_once('Db.php');


abstract class Crud extends Db
{
    protected $nomeTabela =  null;

    abstract function inserirDados();
    abstract function atualizarDados($id);

    public function selecionarTodosRegistros()
    {
        $sql = "SELECT * FROM $this->nomeTabela";
        $query = self::preparar($sql);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function selecionarUmRegistro($id)
    {
        $sql = 'SELECT * FROM $this->nomeTabela WHERE id = ?';
        $query = self::preparar($sql);
        $query->execute(array($id));
        $res = $query->fetch();

        return $res;
    }

    public function deletarUmRegistro($id)
    {
        $sql = "DELETE FROM $this->nomeTabela WHERE id = ?";
        $query = self::preparar($sql);
        $query->execute(array($id));
        if (!$query)
            return 0;

        return 1;
    }
}