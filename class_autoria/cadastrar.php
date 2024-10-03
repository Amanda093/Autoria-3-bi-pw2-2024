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
    
        <?php
            include_once '../class_autor/autor.php';
            $autor = new Autor();
            $autor_bd = $autor -> listar();

            include_once '../class_livro/livro.php';
            $livro = new Livro();
            $livro_bd = $livro -> listar();
        ?>
        <section class="right">
            <form name="cliente" method="POST" action="">
                <h2 class="title"> Dados da Autoria </h2>
                <br>
                <div class="row">
                    <label for="">Código do Autor</label> 
                    <select name="txtCodAutor" id="">
                    <?php
                        foreach ($autor_bd as $autor_mostrar) {
                    ?>
                    <option value="<?php echo $autor_mostrar[0]; ?>">
                        <?php echo $autor_mostrar[0] . " - " . $autor_mostrar[1]; ?> 
                    </option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="row">
                    <label for="">Código do Livro</label>  
                    <select name="txtCodLivro" id="">
                    <?php
                        foreach ($livro_bd as $livro_mostrar) {
                    ?>
                    <option value="<?php echo $livro_mostrar[0]; ?>">
                        <?php echo $livro_mostrar[0] . " - " . $livro_mostrar[1]; ?> 
                    </option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="row">
                    <label for="">Data de Lançamento</label>
                    <input name="txtDataLanc" type="date" size="40" maxlength="40" required>
                </div>
                <div class="row">
                    <label for="">Editora</label>
                    <input name="txtEditora" type="text" size="40" maxlength="40" required>
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
                include_once 'Autoria.php';
                $aut = new Autoria();
                $aut -> setCod_autor($txtCodAutor);
                $aut -> setCod_livro($txtCodLivro);
                $aut -> setDatalancamento($txtDataLanc);
                $aut -> setEditora($txtEditora);
                echo $aut -> salvar();
            }
            ?>
        </section>
    </body>
</html>