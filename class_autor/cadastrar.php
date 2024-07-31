<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/produto.png" />
    <title>Listar</title>
</head>

<body>
    <?php include_once '../layouts/navbar.php' ?>

    <section class="right">
        <form name="cliente" method="POST" action="">
            <h2 class="title"> Dados do Livro </h2>
            <br>
            <div class="row">
                <label for="">Título</label>
                <input name="txtTitulo" type="text" size="40" maxlength="40"></p>
            </div>
            <div class="row">
                <label for="">Categoria</label>
                <input name="txtTitulo" type="text" size="40" maxlength="40"></p>
            </div>
        </form>

        <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnEnviar))
        {
            include_once 'Autoria.php';
            $aut = new Autoria();
            $aut -> setTitulo($txtTitulo);
            $aut -> setCategoria($txtCategoria);
            $aut -> setISBN($txtISBN);
            $aut -> setIdioma($txtIdioma);
            $aut -> setQtdepag($txtQtdePag);
            echo "<h3><br><br>" . $aut -> salvar() . "</h3>";
        }
        ?>
    </section>
</body>

</html>