<?php

include_once '../conectar.php';

    // ===== parte 1 - atributos =====
class Autoria
{
    private $cod_autor;
    private $cod_livro;
    private $datalancamento;
    private $editora;
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

    // cod_livro
    public function getCod_livro()
    {
        return $this->cod_livro;
    }

    public function setCod_livro($icod_livro)
    {
        $this->cod_livro = $icod_livro;
    }

    // datalancamento
    public function getDatalancamento()
    {
        return $this->datalancamento;
    }

    public function setDatalancamento($idatalancamento)
    {
        $this->datalancamento = $idatalancamento;
    }

    // editora
    public function getEditora()
    {
        return $this->editora;
    }

    public function setEditora($ieditora)
    {
        $this->editora = $ieditora;
    }

    // ===== parte 3 - métodos =====
    function listar()
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> query("select * from autoria order by datalancamento");
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