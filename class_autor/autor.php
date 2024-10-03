<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<?php

include_once '../conectar.php';

    // ===== parte 1 - atributos =====
class Autor
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

    function salvar()
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("insert into Autor values (null,?,?,?,?)");
            @$sql->bindParam(1, $this->getNomeAutor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getNasc(), PDO::PARAM_STR);
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

    function alterar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("update Autor set NomeAutor = ?, Sobrenome = ?, Email = ?, Nasc = ? where Cod_autor = ?");
            @$sql->bindParam(1, $this->getNomeAutor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getNasc(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getCod_autor(), PDO::PARAM_INT);
            if ($sql->execute() == 1) {
                return 1;
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar. " . $exc->getMessage();
        }
    }

    function consultar() 
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("select * from Autor where Cod_Autor = ?"); // informei o ? (parametro)
            @$sql ->  bindParam(1, $this -> getCod_Autor(), PDO::PARAM_INT); // inclui esta linha para definir o parametro
            // @$sql -> bindParam(1, $this -> getCod_Autor() . "%", PDO::PARAM_STR);
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

    function exclusao()  // NAO FUNCIONA O SWEETALERT
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("delete from Autor where Cod_Autor = ?"); // informei o ? (parametro)
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
            $sql = $this -> conn -> query("select * from Autor order by Cod_Autor");
            $sql -> execute();
            return $sql -> fetchAll();
            $this -> conn = null;
        } 
        catch (PDOException $exc) {
            echo '
            <script type="text/javascript">
            $(document).ready(function(){
                Swal.fire ({
                title: "Houve um erro ao listar",
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