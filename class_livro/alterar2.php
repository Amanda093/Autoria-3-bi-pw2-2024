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
        $codLivro = $_POST['codLivro'];
        include_once 'Livro.php';
        $a = new Livro();
        $a->setCod_livro($codLivro);
        $aut_bd = $a -> alterar(); // chamada de método com retorno - o $p é o parâmetro enviado

        extract($_POST, EXTR_OVERWRITE);
        if (isset($enviar)) {
            $liv->setTitulo($txtTitulo);
            $liv->setCategoria($txtCategoria);
            $liv->setISBN($txtISBN);
            $liv->setIdioma($txtIdioma);
            $liv->setQtdePag($txtQtdepag);
            $liv->setCod_livro($txtCodLivro);
            $sucesso = $liv->alterar();
            header("location:alterar1.php");
        }
        ?>

        <section class="right">
            <?php
            foreach($aut_bd as $aut_mostrar) {
                ?>
                <form name="cliente2" method="POST" action=""> 
                    <input type="hidden" name="codLivro" size="5" value='<?php echo $pro_mostrar[0] ?>'>
                    <b><?php echo "CodLivro: " . $pro_mostrar[0]; ?></b>
                    
                    <br><br>
                    <b><?php echo "Titulo: "; ?></b>
                    <input type="text" name="txtTitulo" size="25" value='<?php echo $pro_mostrar[1] ?>'>
                    
                    <br><br>
                    <b><?php echo "Categoria: "; ?></b>
                    <input type="text" name="txtCategoria" size="25" value='<?php echo $aut_mostrar[2] ?>'>
                    
                    <br><br>
                    <b><?php echo "ISBN: "; ?></b>
                    <input type="text" name="txtISBN" size="15" value='<?php echo $aut_mostrar[3] ?>'>
                    
                    <br><br>
                    <b><?php echo "Idioma: "; ?></b>
                    <input type="text" name="txtIdioma" size="15" value='<?php echo $aut_mostrar[4] ?>'>
                    
                    <br><br>
                    <b><?php echo "Quantidade de Páginas: "; ?></b>
                    <input type="text" name="txtQtdePag" size="5" value='<?php echo $aut_mostrar[5] ?>'>
                    
                    <br><br>
                    <center><input name="btnAlterar" type="submit" value="Alterar"></center>
                </form>
                <?php } 
            ?>            
    </section>
    </body>
</html>