<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" />
        
        <link rel="icon" href="../img/autoria.png" />
        <title>Listar</title>
    </head>
    <body>
        <?php include_once '../layouts/navbar.php' ?>
    
        <section class="right">
          <table>
            <?php
            include_once 'livro.php';
            $a = new Livro();
            $aut_bd = $a -> listar();
            ?>
            
            <tr>
                <th> Código do livro </th> <th> Título </th> <th> Categoria </th> 
                <th> ISBN </th> <th> Idioma </th> <th> Quantidade de páginas </th> 
            </tr>
    
            <?php
            foreach ($aut_bd as $aut_mostrar) {
                ?>
                <br><br>
                <tr> <th> <?php echo $aut_mostrar[0]; ?> </th>  </b> 
                <td> <?php echo $aut_mostrar[1]; ?> </td>
                <td> <?php echo $aut_mostrar[2]; ?> </td>
                <td> <?php echo $aut_mostrar[3]; ?> </td>
                <td> <?php echo $aut_mostrar[4]; ?> </td>
                <td> <?php echo $aut_mostrar[5]; ?> </td>
                <?php
            }
            ?>
            </table>
        </section>
    </body>
</html>