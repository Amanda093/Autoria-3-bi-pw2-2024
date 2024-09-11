<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" />
        
        <link rel="icon" href="../img/autoria.png" />
        <title>Excluir</title>
    </head>
    <body>
        <?php include_once '../layouts/navbar.php' ?>
    
        <?php
        include_once 'autor.php';
        $a = new Autor();
        $aut_bd = $a -> listar();
        ?>

        <section class="right">
            <form name="cliente" method="POST" action="">
                <h2 class="title"> Pesquisa de Autores Cadastrados </h2>
                <br>
                <div class="row">
                    <label for=""> Selecione o código para pesquisar </label>
                    <select name="codAutor" size="1">
                        <?php foreach ($aut_bd as $aut_mostrar) {
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
                        $a -> setCod_Autor($codAutor); 
                        $aut_bd = $a -> consultar();
                        foreach ($aut_bd as $aut_mostrar) {
                            ?>
                            <table>
                                <br><br>
                                <tr>
                                    <th> Código do autor </th> <th colspan="2"> Nome do autor </th>
                                    <th> Email </th> <th> Data de Nascimento </th>
                                </tr>
                                <tr> <th> <?php echo $aut_mostrar[0]; ?> </th> 
                                <td> <?php echo $aut_mostrar[1]; ?> </td>
                                <td> <?php echo $aut_mostrar[2]; ?> </td>
                                <td> <?php echo $aut_mostrar[3]; ?> </td>
                                <td> <?php echo $aut_mostrar[4]; ?> </td>
                                </table>
                            <?php
                        }
                    }
                ?>
            
    </section>
    </body>
</html>