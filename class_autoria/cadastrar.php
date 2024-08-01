<!DOCTYPE html>
<html lang="pt-br">
    <body>
        <?php include_once '../layouts/navbar.php' ?>
    
        <section class="right">
            <form name="cliente" method="POST" action="">
                <h2 class="title"> Dados da Autoria </h2>
                <br>
                <div class="row">
                    <label for="">Código do Autor</label> 
                    <input name="txtCodLivro" type="number" size="40" maxlength="40" required>
                </div>
                <div class="row">
                    <label for="">Código do Livro</label>  
                    <input name="txtCodLivro" type="number" size="40" maxlength="40" required>
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