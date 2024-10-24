<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<?php

include_once 'conectar.php';

class Usuario {
    // parte 1 - atributos
    private $usuario;
    private $senha;
    private $conn;

    // parte 2 - os getters e setters

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($iusuario)
    {
        $this->usuario = $iusuario;
    }

    public function getSenha() 
    {
        return $this->senha;
    }

    public function setSenha($isenha)
    {
        $this->senha = $isenha;
    }

    // parte 3 - métodos

    function logar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from Usuario where usuario like ? and senha = ?");
            @$sql-> bindParam(1, $this->getUsuario(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getSenha(), PDO::PARAM_STR);
            $sql->execute();

            return $sql->fetchAll();
            $this->conn = null;

        } catch(PDOException $exc) {
            echo '<script type="text/javascript">
            $(document).ready(function(){
                Swal.fire ({
                title: "Houve um erro ao registrar!",
                footer: "'. $exc -> getMessage() . '",
                
                confirmButtonColor: " #1f945d",
                color: "#201b2c",

                imageUrl: "img/zebra correndo.gif",
                imageWidth: 200,
                imageAlt: "Peixe colorido",

                background: "#100d16",
                })
              });
            </script>';
        }
    }
} // encerramento da classe Usuario