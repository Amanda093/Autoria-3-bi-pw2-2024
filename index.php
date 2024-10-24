<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" />

        <style>
            body {
                display: flex; 
                justify-content: center;
                align-items: center;
            }

            a {
                text-decoration: none;
                color:  #2b134b;
            }
        </style>

        <script language=javascript>
            function blokletras(keypress)
            {
                // campo senha - bloqueia letras
                if(keypress >= 48 && keypress <= 57) {
                    return true;
                }
                else {
                    return false;
                }
            }
        </script>

        <link rel="icon" href="img/autoria.png" />
        <title>Login</title>
    </head>
    <body>
        <section>
            <form name="cliente" method="POST" action="">
                <h2 class="title"> Login </h2>
                <br>
                <div class="row">
                    <label for="">Usuário</label>
                    <input name="txtUsuario" type="text" size="40" maxlength="40" required>
                </div>
                <div class="row">
                    <label for="">Senha</label>
                    <input name="txtSenha" type="password" maxlength="13" onkeypress="return blokletras(window.event.keyCode)"  required>
                </div>
                <div class="row">
                    <button name="btnEnviar" type="submit">Verificar</button>
                    <button name="btnLimpar" type="reset">Limpar</button>
                </div>
            </form>
            <br>
        <?php 
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnEnviar))
        {
            include_once 'class_usuario/usuario.php';
            $user = new Usuario();

            $user->setUsuario($txtUsuario);
            $user->setSenha($txtSenha);
            $pro_bd=$user->logar();
    
            $existe = false;
            foreach($pro_bd as $pro_mostrar)
            {
                $existe = true; ?>
                <script type="text/javascript">
                    $(document).ready(function() {
                    Swal.fire({
                        title: "Seja bem vindo!!",
                        confirmButtonColor: " #1f945d",
                        color: "#201b2c",
                        
                        imageUrl: "img/peixinho.gif",
                        imageWidth: 200,
                        imageAlt: "Peixe colorido",
                        
                        background: "#100d16",
                    }).then((result) => {
                        if (result.isConfirmed) {
                        window.location.href = 'menu.php'; // Redireciona ao clicar no botão de confirmação
                    }
                    });
                });
                </script>
                <?php
            }
            if($existe==false) {
                header("location:loginInvalido.php");
            }
        }
        ?>
        </section>

    </body>
</html>