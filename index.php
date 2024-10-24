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
                <form action="">
                    <div class="row">
                        <br><h2><?php echo "Seja bem vindo! "?></h2><br><br>
                        <button onclick="location.href = 'menu.php'">Entrar</button>
                    </div>
                </form>
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