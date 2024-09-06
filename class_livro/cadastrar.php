<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="../css/style.css" />
        
        <link rel="icon" href="../img/autoria.png" />
        <title>Autoria</title>
    </head>
    <body>
        <?php include_once '../layouts/navbar.php' ?>
    
        <section class="right">
            <form name="cliente" method="POST" action="">
                <h2 class="title"> Dados do Livro </h2>
                <br>
                <div class="row">
                    <label for="">Título</label>
                    <input name="txtTitulo" type="text" size="40" maxlength="40" required>
                </div>
                <div class="row">
                    <label for="">Categoria</label>
                    <select name="txtCategoria" size="1">
                        <option value="Fiçcão">Ficção</option>
                        <option value="Não-Fiçcão">Não-ficção</option>
                        <option value="Romance">Romance</option>
                        <option value="Mistério">Mistério</option>
                        <option value="Fantasia">Fantasia</option>
                        <option value="Fiçcão-cientifica">Ficção Científica</option>
                        <option value="Biografia">Biografia</option>
                        <option value="Autoajuda">Autoajuda</option>
                        <option value="Histórico">Histórico</option>
                        <option value="Infantil">Infantil</option>
                        <option value="Jovem-adulto">Jovem Adulto</option>
                        <option value="Terror">Terror</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Poesia">Poesia</option>
                    </select>
                </div>
                <div class="row">
                    <label for="">ISBN</label>
                    <input id="isbn" name="txtISBN" type="tel" maxlength="13" required>
                    
                    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
                    <script> $("#isbn").mask("000-00-000-0000-0"); </script> <!-- MASK FORMATTER -->
                </div>
                <div class="row">
                    <label for="">Idioma</label>
                    <input name="txtIdioma" type="text" size="40" maxlength="40" required>
                </div>
                <div class="row">
                    <label for="">Quantidade de Páginas</label>
                    <input name="txtQtdePag" type="number" required>
                </div>
                <div class="row">
                    <button name="btnEnviar" type="submit">Cadastrar</button>
                    <button name="btnLimpar" type="reset">Limpar</button>
                </div>
            </form>
        </section>

        <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnEnviar))
        {
            include_once 'Livro.php';
            $aut = new Livro();
            $aut -> setTitulo($txtTitulo);
            $aut -> setCategoria($txtCategoria);
            $aut -> setISBN($txtISBN);
            $aut -> setIdioma($txtIdioma);
            $aut -> setQtdepag($txtQtdePag);
            echo $aut -> salvar();
        }
        ?>
    </body>
</html>