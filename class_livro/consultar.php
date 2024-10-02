<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" />
        <style> .right { flex-direction: column; } </style>

        <link rel="icon" href="../img/autoria.png" />
        <title>Pesquisar</title>
    </head>
    <body>
        <?php include_once '../layouts/navbar.php' ?>
    
        <?php
        include_once 'livro.php';
        $a = new Livro();
        $aut_bd = $a -> listar();
        ?>

        <section class="right">
            <form name="cliente" method="POST" action="">
                <h2 class="title"> Pesquisa de Livros Cadastrados </h2>
                <br>
                <div class="row">
                    <label for=""> Selecione o código para pesquisar </label>
                    <select name="codLivro" size="1">
                        <?php foreach ($aut_bd as $aut_mostrar) { // TODO mostra o numero de qm foi excluido
                            echo '<option value = "' . $aut_mostrar[0] . '">' . $aut_mostrar[0] . ' - ' . $aut_mostrar[1] .'</option>';
                        } ?>
                    </select>
                </div>
                <div class="row">
                    <button name="btnEnviar" type="submit">Pesquisar</button>
                </div>
            </form>

                <?php
                    extract($_POST, EXTR_OVERWRITE);
                    if(isset($btnEnviar)) {
                        $a -> setCod_livro($codLivro); 
                        $aut_bd = $a -> consultar();
                        foreach ($aut_bd as $aut_mostrar) {
                            ?>
                            <table>
                                <br><br>
                                <tr>
                                    <th> Código do livro </th> <th> Título </th> <th> Categoria </th> 
                                    <th> ISBN </th> <th> Idioma </th> <th> Quantidade de páginas </th> 
                                </tr>
                                <tr> <th> <?php echo $aut_mostrar[0]; ?> </th>  </b> 
                                <td> <?php echo $aut_mostrar[1]; ?> </td>
                                <td> <?php echo $aut_mostrar[2]; ?> </td>
                                <td> <?php echo $aut_mostrar[3]; ?> </td>
                                <td> <?php echo $aut_mostrar[4]; ?> </td>
                                <td> <?php echo $aut_mostrar[5]; ?> </td>
                                </table>
                            <?php
                        }
                    }
                ?>
            
    </section>
    </body>
</html>