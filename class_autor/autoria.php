<?php

include_once '../conectar.php';

    // ===== parte 1 - atributos =====
class Autoria
{
    private $cod_autor;
    private $nomeautor;
    private $sobrenome;
    private $email;
    private $nasc;
    private $conn;

    // ===== parte 2 - os getters e setters =====

    // cod_autor
    public function getCod_autor()
    {
        return $this->cod_autor;
    }

    public function setCod_autor($icod_autor)
    {
        $this->cod_autor = $icod_autor;
    }

    // nome autor
    public function getNomeautor()
    {
        return $this->nomeautor;
    }

    public function setNomeautor($inomeautor)
    {
        $this->nomeautor = $inomeautor;
    }

    // sobrenome
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome($isobrenome)
    {
        $this->sobrenome = $isobrenome;
    }

    // email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($iemail)
    {
        $this->email = $iemail;
    }

    // nasc
    public function getNasc()
    {
        return $this->nasc;
    }

    public function setNasc($inasc)
    {
        $this->nasc = $inasc;
    }

    // ===== parte 3 - métodos =====
    function listar()
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> query("select * from autor order by cod_autor");
            $sql -> execute();
            return $sql -> fetchAll();
            $this -> conn = null;
        } 
        catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc -> getMessage();
        }
    }
} // encerramento de classe Autoria

?>