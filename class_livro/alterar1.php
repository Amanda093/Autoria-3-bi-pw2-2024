<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" />
        <style> .right { flex-direction: column; } </style>

        <link rel="icon" href="../img/autoria.png" />
        <title>Alterar</title>
    </head>
    <body>
        <?php include_once '../layouts/navbar.php' ?>

        <?php
        include_once 'livro.php';
        $a = new Livro();
        $aut_bd = $a -> listar();
        ?>
        
        <section class="right">
            <form name="cliente" method="POST" action="alterar2.php">
                <h2 class="title"> Alteração de Livros Cadastrados </h2>
                <br>
                <div class="row">
                    <label for=""> Selecione o código para alterar </label>
                    <select name="codLivro" size="1">
                        <?php foreach ($aut_bd as $aut_mostrar) { // TODO mostra o numero de qm foi excluido
                            echo '<option value = "' . $aut_mostrar[0] . '">' . $aut_mostrar[0] . ' - ' . $aut_mostrar[1] .'</option>';
                        } ?>
                    </select>
                </div>
                <div class="row">
                    <button name="btnEnviar" type="submit">Alterar</button>
                    <button name="btnLimpar" type="reset">Limpar</button>
                </div>
            </form>
        </section>
    </body>
</html>