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

    function salvar()
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("insert into Autor values (null,?,?,?,?)");
            @$sql -> bindParam(1, $this -> getNomeautor(), PDO::PARAM_STR);
            @$sql -> bindParam(2, $this -> getSobrenome(), PDO::PARAM_STR);
            @$sql -> bindParam(3, $this -> getEmail(), PDO::PARAM_STR);
            @$sql -> bindParam(4, $this -> getNasc(), PDO::PARAM_STR);
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