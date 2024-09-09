<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" />
        
        <link rel="icon" href="../img/autoria.png" />
        <title>Excluir</title>
    </head>
    <body>
        <?php include_once '../layouts/navbar.php' ?>
    
        <section class="right">
            <form name="cliente" method="POST" action="">
                <h2 class="title"> Exclusão de Livros Cadastrados </h2>
                <br>
                <div class="row">
                    <label for=""> Informe o <b>Código</b> do livro desejado </label> 
                    <input name="txtCod" type="text" size="40" maxlength="40" required>
                </div>

                <div class="row">
                    <label for=""> Resultado </label>
                    <?php
                        extract($_POST, EXTR_OVERWRITE);
                        if(isset($btnEnviar)) {
                            include_once 'Produto.php';
                            $p = new Produto();
                            $p -> setId($txtid);
                            echo "<h3>" . $p -> exclusao() . "</h3>";
                        }
                    ?>
                </div>
                <div class="row">
                    <button name="btnEnviar" type="submit">Cadastrar</button>
                    <button name="btnLimpar" type="reset">Limpar</button>
                </div>
            </form>
        </section>
    </body>
</html>