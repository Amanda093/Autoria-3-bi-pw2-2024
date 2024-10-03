<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

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
            $sql = $this -> conn -> prepare("insert into Autoria values (?,?,?,?)");
            @$sql -> bindParam(1, $this -> getCod_autor(), PDO::PARAM_INT);
            @$sql -> bindParam(2, $this -> getCod_livro(), PDO::PARAM_INT);
            @$sql -> bindParam(3, $this -> getDatalancamento(), PDO::PARAM_STR);
            @$sql -> bindParam(4, $this -> getEditora(), PDO::PARAM_STR);
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
    function alterar1() 
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("select * from Autoria where Cod_autor like ? and Cod_livro like ?"); // informei o ? (parametro)
            @$sql ->  bindParam(1, $this -> getCod_Autor(), PDO::PARAM_INT); // inclui esta linha para definir o parametro
            @$sql ->  bindParam(2, $this -> getCod_livro(), PDO::PARAM_INT);
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
    function alterar2() 
    {
        try {
            $this -> conn = new Conectar();
                $sql = $this -> conn -> prepare("update Autoria set DataLancamento = ?, Editora = ? where Cod_Livro = ? and Cod_Autor = ?");
                @$sql -> bindParam(1, $this -> getDatalancamento(), PDO::PARAM_STR);
                @$sql -> bindParam(2, $this -> getEditora(), PDO::PARAM_STR);
                @$sql -> bindParam(3, $this -> getCod_livro(), PDO::PARAM_INT); // FK
                @$sql -> bindParam(4, $this -> getCod_autor(), PDO::PARAM_INT); // FK
    
                if($sql -> execute() == 1) {
                    return '
                    <script type="text/javascript">
                        sweetalert("Registro alterado com sucesso!");
                    </script>';
                }
                $this -> conn = null;
        } catch (PDOException $exc) {
                echo '
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