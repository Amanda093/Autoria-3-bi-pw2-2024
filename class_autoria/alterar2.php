<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" />
        <style> .right { flex-direction: column; } </style>
        
        <link rel="icon" href="../img/autoria.png" />
        <title>Alterar2</title>
    </head>
    <body>
        <?php include_once '../layouts/navbar.php' ?>

        <?php
        $txtCodLivro = $_POST['txtCodLivro'];
        $txtCodAutor = $_POST["txtCodAutor"];
        include_once 'autoria.php';
        $a = new Autoria();
        $a->setCod_livro($txtCodLivro);
        $a->setCod_autor($txtCodAutor);
        $aut_bd = $a -> consultar(); // chamada de método com retorno - o $p é o parâmetro enviado

        extract($_POST, EXTR_OVERWRITE);
        if(isset($Enviar)) {
            $a->setTitulo($txtDataLancamento);
            $a->setCategoria($txtEditora);
            $a->setCod_livro($txtCodLivro);
            $a->setCod_autor($txtCodAutor);
            $a->alterar();
            header("location:alterar1.php");
        }
        ?>

        <section class="right">
            <form name="cliente" method="POST" action=""> 
            <?php foreach($aut_bd as $aut_mostrar) { ?>
                    <h2 class="title"> Alteração de Autorias Cadastradas </h2>
                    <div class="row">
                        <label for="">Código do Livro</label>
                        <input class="input_disabled"type="text" name="txtCodLivro" size="5" value='<?php echo $aut_mostrar[0] ?>' tabindex="-1">
                    </div>
                    <div class="row">
                        <label for="">Código do Autor</label>
                        <input class="input_disabled"type="text" name="txtCodAutor" size="5" value='<?php echo $aut_mostrar[1] ?>' tabindex="-1">
                    </div>
                    <div class="row">
                        <label for="">Título</label>
                        <input name="txtTitulo" type="text" size="40" value='<?php echo $aut_mostrar[2] ?>' maxlength="40" required>
                    </div>
                    <div class="row">
                        <label for="">Data de Lancamento</label>
                        <input name="txtDataLancamento" value='<?php echo $aut_mostrar[3] ?>' size="1">
                    </div>
                    <div class="row">
                        <button name="Enviar" type="submit">Alterar</button>
                    </div>
                </form>
                <?php }    
            ?>            
    </section>
    </body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script> $("#isbn").mask("000-00-000-0000-0"); </script> <!-- MASK FORMATTER -->
</html>