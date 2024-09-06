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
                <h2 class="title"> Consultar Livros Cadastrados </h2>
                <br>
                <div class="row">
                    <label for=""> Informe o <b>Nome</b> do livro desejado </label> 
                    <input name="txtNome" type="text" size="40" maxlength="40" required>
                </div>

                <div class="row">
                    <label for=""> Resultado </label>
                    <?php
                        extract($_POST, EXTR_OVERWRITE);
                        if(isset($btnEnviar))
                        {
                            include_once 'Livro.php';
                            $p = new Produto();
                            $p -> setNome($txtnome . '%'); // o . '%' serve para uma busca aproximada da determinada letra informada
                            $pro_bd = $p -> consultar();
                        
                            foreach ($pro_bd as $pro_mostrar) {
                                ?> <br>
                                <b> <?php echo "ID: " . $pro_mostrar[0]; ?> </b>
                                <b> <?php echo "Nome: " . $pro_mostrar[1]; ?> </b>
                                <b> <?php echo "Estoque: " . $pro_mostrar[2]; ?> </b>
                                <?php 
                            }
                        }
                    ?>
                </div>
                <div class="row">
                    <button name="btnEnviar" type="submit">Cadastrar</button>
                    <button name="btnLimpar" type="reset">Limpar</button>
                </div>
            </form>
        </section>
    </body>
</html>