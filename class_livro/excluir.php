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
    
        <?php
        include_once 'livro.php';
        $a = new Livro();
        $aut_bd = $a -> listar();
        ?>

        <section class="right">
            <form name="cliente" method="POST" action="">
                <h2 class="title"> Exclusão de Livros Cadastrados </h2>
                <br>
                <div class="row">
                    <label for=""> Selecione o código para excluir </label>
                    <select name="codLivro" size="1">
                        <?php foreach ($aut_bd as $aut_mostrar) { // TODO ainda mostra o numero de qm foi excluido
                            echo '<option value = "' . $aut_mostrar[0] . '">' . $aut_mostrar[0] . ' - ' . $aut_mostrar[1] .'</option>';
                        } ?>
                    </select>
                </div>

                <div class="row">
                    <?php
                        extract($_POST, EXTR_OVERWRITE);
                        if(isset($btnEnviar)) {
                            $a -> setCod_livro($codLivro);
                            echo "<h3>" . $a -> exclusao() . "</h3>";
                        }
                    ?>
                </div>
                <div class="row">
                    <button name="btnEnviar" type="submit">Excluir</button>
                </div>
            </form>
        </section>
    </body>
</html>