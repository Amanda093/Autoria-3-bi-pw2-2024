<?php

include_once '../conectar.php';

    // ===== parte 1 - atributos =====
class Autoria
{
    private $cod_livro;
    private $titulo;
    private $categoria;
    private $ISBN;
    private $idioma;
    private $qtdepag;
    private $conn;

    // ===== parte 2 - os getters e setters =====

    // cod_livro
    public function getCod_livro()
    {
        return $this->cod_livro;
    }

    public function setCod_livro($icod_livro)
    {
        $this->cod_livro = $icod_livro;
    }

    // titulo
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($ititulo)
    {
        $this->titulo = $ititulo;
    }

    // categoria
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($icategoria)
    {
        $this->categoria = $icategoria;
    }
    
    // ISBN
    public function getISBN()
    {
        return $this->ISBN;
    }

    public function setISBN($iISBN)
    {
        $this->ISBN = $iISBN;
    }

    // idioma
    public function getIdioma()
    {
        return $this->idioma;
    }

    public function setIdioma($iidioma)
    {
        $this->idioma = $iidioma;
    }

    // quantidade de páginas
    public function getQtdepag()
    {
        return $this->qtdepag;
    }

    public function setQtdepag($iqtdepag)
    {
        $this->qtdepag = $iqtdepag;
    }

    // ===== parte 3 - métodos =====

    function salvar()
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("insert into Livro values (null,?,?,?,?,?)");
            @$sql -> bindParam(1, $this -> getTitulo(), PDO::PARAM_STR);
            @$sql -> bindParam(2, $this -> getCategoria(), PDO::PARAM_STR);
            @$sql -> bindParam(3, $this -> getISBN(), PDO::PARAM_STR);
            @$sql -> bindParam(4, $this -> getIdioma(), PDO::PARAM_STR);
            @$sql -> bindParam(5, $this -> getQtdepag(), PDO::PARAM_STR);
            // PDO::PARAM_STR representa o tipo de dados SQL CHAR, VARCHAR ou outra String. 
            if($sql -> execute() == 1)
            {
                return "Registrado com sucesso!";
            }
            $this -> conn = null;
        } catch(PDOException $exc) {
            echo "Erro ao salvar o registo" . $exc -> getMessage();
        }
    }

    function listar()
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> query("select * from Livro order by cod_livro");
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