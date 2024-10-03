
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" />

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

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
        $aut_bd = $a -> alterar1(); // chamada de método com retorno - o $p é o parâmetro enviado

        extract($_POST, EXTR_OVERWRITE);
        if(isset($Enviar)) {
            $a->setDatalancamento($txtDataLancamento);
            $a->setEditora($txtEditora);
            $a->setCod_livro($txtCodLivro);
            $a->setCod_autor($txtCodAutor);
            $a->alterar2();
            header("location:alterar1.php");
        }
        ?>

        <section class="right">
            <form name="cliente" method="POST" action=""> 
            <?php if(count($aut_bd) === 0) {
                echo '
                <script type="text/javascript">
                function voltar(){
                    window.location.href = "alterar1.php";
                }

                $(document).ready(function(){
                    Swal.fire ({
                    title: "Nenhum registro com este Código de Cliente e Código de Livro encontrado!!",
                    
                    html: `
                    <button name="btnVoltar" class="botao-borda" onclick="voltar()" type="submit">Voltar</button>

                    `,
                    showConfirmButton: false,
    
                    imageUrl: "../img/peixinho.gif",
                    imageWidth: 200,
                    imageAlt: "Peixe colorido",
    
                    background: "#100d16",
                    })
                  });
                </script>';
                } else {
                foreach($aut_bd as $aut_mostrar) { ?>
                    <h2 class="title"> Alteração de Autorias Cadastradas </h2>
                    <div class="row">
                        <label for="">Código do Autor</label>
                        <input class="input_disabled"type="text" name="txtCodAutor" size="5" value='<?php echo $aut_mostrar[0] ?>' tabindex="-1">
                    </div>
                    <div class="row">
                        <label for="">Código do Livro</label>
                        <input class="input_disabled"type="text" name="txtCodLivro" size="5" value='<?php echo $aut_mostrar[1] ?>' tabindex="-1">
                    </div>
                    <div class="row">
                        <label for="">Data de Lancamento</label>
                        <input name="txtDataLancamento" value='<?php echo $aut_mostrar[2] ?>' size="1">
                    </div>
                    <div class="row">
                        <label for="">Editora</label>
                        <input name="txtEditora" type="text" size="40" value='<?php echo $aut_mostrar[3] ?>' maxlength="40" required>
                    </div>
                    <div class="row">
                        <button name="Enviar" type="submit">Alterar</button>
                    </div>
                </form>
                <?php }    
                }
            ?>            
    </section>
    </body>
</html>