<?php
$txtCodLivro = $_POST['txtCodLivro'];
include_once 'Livro.php';
$a = new Livro();
$a->setCod_livro($txtCodLivro);
$aut_bd = $a -> consultar(); // chamada de método com retorno - o $p é o parâmetro enviado

extract($_POST, EXTR_OVERWRITE);
if(isset($Enviar)) {
    $a->setTitulo($txtTitulo);
    $a->setCategoria($txtCategoria);
    $a->setISBN($txtISBN);
    $a->setIdioma($txtIdioma);
    $a->setQtdePag($txtQtdePag);
    $a->setCod_livro($txtCodLivro);
    $a->alterar();
}
?>
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

        

        <section class="right">
                <form name="cliente" method="POST" action=""> 
                <?php
            foreach($aut_bd as $aut_mostrar) {
                ?>
                    <h2 class="title"> Dados do Livro </h2>
                    <div class="row">
                        <label for="">Código do Livro</label>
                        <input class="input_disabled"type="text" name="txtCodLivro" size="5" value='<?php echo $aut_mostrar[0] ?>' tabindex="-1">
                    </div>
                    <div class="row">
                        <label for="">Título</label>
                        <input name="txtTitulo" type="text" size="40" value='<?php echo $aut_mostrar[1] ?>' maxlength="40" required>
                    </div>
                    <div class="row">
                        <label for="">Categoria</label>
                        <input name="txtCategoria" value='<?php echo $aut_mostrar[2] ?>' size="1">
                    </div>
                    <div class="row">
                        <label for="">ISBN</label>
                        <input id="isbn" name="txtISBN" value='<?php echo $aut_mostrar[3] ?>' type="tel" maxlength="13" required> 
                    </div>
                    <div class="row">
                        <label for="">Idioma</label>
                        <input name="txtIdioma" type="text" size="40"  value='<?php echo $aut_mostrar[4] ?>' maxlength="40" required>
                    </div>
                    <div class="row">
                        <label for="">Quantidade de Páginas</label>
                        <input name="txtQtdePag" value='<?php echo $aut_mostrar[5] ?>' type="number" required>
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