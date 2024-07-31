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
        include_once 'autoria.php';
        $a = new Autoria();
        $aut_bd = $a -> listar();
        ?>
        
        <tr>
            <th> Código do autor </th> <th> Código do livro </th> 
            <th> Data de Lançamento </th> <th> Editora </th>
        </tr>

        <?php
        foreach ($aut_bd as $aut_mostrar) {
            ?>
            <br><br>
            <tr> <td> <?php echo $aut_mostrar[0]; ?> </td>
            <td> <?php echo $aut_mostrar[1]; ?> </td>
            <td> <?php echo $aut_mostrar[2]; ?> </td>
            <td> <?php echo $aut_mostrar[3]; ?> </td>
            <?php
        }
        ?>
        </table>
    </section>
</body>

</html>