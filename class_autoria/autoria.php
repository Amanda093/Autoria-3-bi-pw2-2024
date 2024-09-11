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
            $sql = $this -> conn -> prepare("insert into Autoria values (null,?,?,?,?,?)");
            @$sql -> bindParam(1, $this -> getTitulo(), PDO::PARAM_STR);
            @$sql -> bindParam(2, $this -> getCategoria(), PDO::PARAM_STR);
            @$sql -> bindParam(3, $this -> getISBN(), PDO::PARAM_STR);
            @$sql -> bindParam(4, $this -> getIdioma(), PDO::PARAM_STR);
            @$sql -> bindParam(5, $this -> getQtdepag(), PDO::PARAM_STR);
            // PDO::PARAM_STR representa o tipo de dados SQL CHAR, VARCHAR ou outra String. 
            if($sql -> execute() == 1)
            {
                return '
                <script type="text/javascript">
                    sweetalert("Registrado com sucesso!");
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
                
                confirmButtonColor: " #1f945d",
                color: "#201b2c",

                imageUrl: "../img/peixinho.gif",
                imageWidth: 200,
                imageAlt: "Peixe colorido",

                background: "#100d16",
                })
              });
            </script>';
        }
    }

    /*
    function alterar() 
    {
        try {
            $this ->  conn = new Conectar();
            $sql = $this -> conn -> prepare("select * from produto where id = ?"); // informei o ? (parametro)
            @$sql -> bindParam(1, $this -> getId(), PDO::PARAM_STR); // inclui esta linha para definir o parametro
            $sql -> execute();
            return $sql -> fetchAll();
            $this -> conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar. " . $exc -> getMessage();
        }
    }
    function alterar2() 
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("update produto set nome = ?, estoque = ? where id = ?");
            @$sql -> bindParam(1, $this -> getNome(), PDO::PARAM_STR);
            @$sql -> bindParam(2, $this -> getEstoque(), PDO::PARAM_STR);
            @$sql -> bindParam(3, $this -> getId(), PDO::PARAM_STR);
            if($sql -> execute() == 1) {
                return "Registro alterado com sucesso!";
            }
            $this -> conn = null;
        } catch (PDOExceotuib $exc) {
            echo "Erro ao salvar o registro. " . $exc -> getMessage();
        }
    }
    */

    function consultar() 
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("select * from Autoria where Cod_Autor = ?"); // informei o ? (parametro)
            @$sql ->  bindParam(1, $this -> getCod_Autor(), PDO::PARAM_INT); // inclui esta linha para definir o parametro
            // @$sql -> bindParam(1, $this -> getCod_Livro() . "%", PDO::PARAM_STR);
            $sql -> execute();
            return $sql -> fetchAll();
            $this -> conn = null;
        } catch (PDOException $exc) {
            echo  '
            <script type="text/javascript">
            $(document).ready(function(){
                Swal.fire ({
                title: "Houve um erro ao consultar",
                footer: "'. $exc -> getMessage() . '",
                
                confirmButtonColor: " #1f945d",
                color: "#201b2c",

                imageUrl: "../img/peixinho.gif",
                imageWidth: 200,
                imageAlt: "Peixe colorido",

                background: "#100d16",
                })
              });
            </script>';
        }
    }

    function exclusao() 
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("delete from Autoria where Cod_Autor = ?"); // informei o ? (parametro)
            @$sql ->  bindParam(1, $this -> getCod_Autor(), PDO::PARAM_INT); // inclui esta linha para definir o parametro
            if($sql -> execute() == 1) {
                return '
                <script type="text/javascript">
                    sweetalert("Excluido com sucesso!");
                </script>
                ';
            } 
            else {
                return "Erro na exclusão! "; 
            }
        } catch (PDOException $exc) {
            echo '
            <script type="text/javascript">
            $(document).ready(function(){
                Swal.fire ({
                title: "Houve um erro ao excluir",
                footer: "'. $exc -> getMessage() . '",
                
                confirmButtonColor: " #1f945d",
                color: "#201b2c",

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

<script type="text/javascript">
    function sweetalert(titulo, mensagemErro = '') {
        $(document).ready(function(){
                Swal.fire ({
                title: titulo,
                footer: mensagemErro,
                
                confirmButtonColor: " #1f945d",
                color: "#201b2c",

                imageUrl: "../img/peixinho.gif",
                imageWidth: 200,
                imageAlt: "Peixe colorido",

                background: "#100d16",
                })
              });
    }
</script>