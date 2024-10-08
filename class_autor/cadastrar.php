<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" />
        
        <link rel="icon" href="../img/autoria.png" />
        <title>Cadastrar</title>
    </head>
    <body>
        <?php include_once '../layouts/navbar.php' ?>
    
        <section class="right">
            <form name="cliente" method="POST" action="">
                <h2 class="title"> Cadastrar Autor </h2>
                <br>
                <div class="row">
                    <label for="">Nome do Autor</label>
                    <input name="txtNome" type="text" size="40" maxlength="40" required>
                </div>
                <div class="row">
                    <label for="">Sobrenome</label>
                    <input name="txtSobrenome" type="text" size="40" maxlength="40" required>
                </div>
                <div class="row">
                    <label for="">Email</label>
                    <input name="txtEmail" type="email" size="40" maxlength="40" required>
                </div>
                <div class="row">
                    <label for="">Data de Nascimento</label>
                    <input name="txtDataNasc" type="date" size="40" maxlength="40" required>
                </div>
                <div class="row">
                    <button name="btnEnviar" type="submit">Cadastrar</button>
                    <button name="btnLimpar" type="reset">Limpar</button>
                </div>
            </form>
    
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnEnviar))
            {
                include_once 'Autor.php';
                $a = new Autor();
                $a -> setNomeautor($txtNome);
                $a -> setSobrenome($txtSobrenome);
                $a -> setEmail($txtEmail);
                $a -> setNasc($txtDataNasc);
                echo $a -> salvar();
            }
            ?>
        </section>
    </body>
</html>