<!DOCTYPE html>
<html lang="html">

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
        include_once 'autor.php';
        $a = new Autor();
        $aut_bd = $a -> listar();
        ?>
        
        <tr>
            <th> Código do autor </th> <th colspan="2"> Nome do autor </th>
            <th> Email </th> <th> Data de Nascimento </th>
        </tr>

        <?php
        foreach ($aut_bd as $aut_mostrar) {
            ?>
            <br><br>
            <tr> <th> <?php echo $aut_mostrar[0]; ?> </th> 
            <td> <?php echo $aut_mostrar[1]; ?> </td>
            <td> <?php echo $aut_mostrar[2]; ?> </td>
            <td> <?php echo $aut_mostrar[3]; ?> </td>
            <td> <?php echo $aut_mostrar[4]; ?> </td>
            <?php
        }
        ?>
        </table>
    </section>
</body>

</html>