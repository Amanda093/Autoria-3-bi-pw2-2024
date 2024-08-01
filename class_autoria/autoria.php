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

    function salvar()
{
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("insert into Autria values (?,?,?,?)");
            @$sql -> bindParam(1, $this -> getCod_autor(), PDO::PARAM_STR);
            @$sql -> bindParam(2, $this -> getCod_livro(), PDO::PARAM_STR);
            @$sql -> bindParam(3, $this -> getDatalancamento(), PDO::PARAM_STR);
            @$sql -> bindParam(4, $this -> getEditora(), PDO::PARAM_STR);
            // PDO::PARAM_STR representa o tipo de dados SQL CHAR, VARCHAR ou outra String. 
            if($sql -> execute() == 1)  
            {
                return '
                <script type="text/javascript">
                $(document).ready(function(){
                    Swal.fire ({
                    title: "Registrado com sucesso!",
                    
                    imageUrl: "../img/peixinho.gif",
                    imageWidth: 200,
                    imageAlt: "Peixe colorido"
                    })
                  });
                </script>';
            }
            $this -> conn = null;
        } catch(PDOException $exc) {
            return '
            <script type="text/javascript">
            $(document).ready(function(){
                Swal.fire ({
                title: "Houve um erro ao registrar!",
                footer: "'. $exc -> getMessage() . '",
                
                imageUrl: "../img/peixinho.gif",
                imageWidth: 200,
                imageAlt: "Peixe colorido",

                background: "#100d16",
            })
              });
            </script>';
        }
    }

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
    
    /*
    function apresentar()
    {
        try {
            $query = $this -> conn -> query("select cod_autor from autor");  
            while($reg = $query -> fetch_array()) { 
                echo 
                "
                <option value = "echo $reg['cod_autor']; ">
                    echo $reg['nome'];
                </option>
                "
            }
        }
    } */
} // encerramento de classe Autoria

?>