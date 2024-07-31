<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" />

    <!-- NÃO FUNCIONA 
      <link rel="icon" href="../img/autoria.png" />
      <title>Autoria</title>
    -->
</head>

<body>
  <header>
    <div class="container container_header">
      <!-- opções header -->
      <div class="left">
        <button onclick = "location.href = '../menu.html'">Principal</button>
        <h2>Livro</h2>
        <ul>
          <li>
            <button onclick = "location.href = '../class_livro/listar.php'">Listar</button>
          </li>
          <li>
            <button onclick = "location.href = '../class_livro/cadastrar.php'">Incluir</button>
          </li>
          <li>
            <button onclick = "location.href = ''">Alterar</button>
          </li>
          <li>
            <button onclick = "location.href = ''">Excluir</button>
          </li>
          <li>
            <button onclick = "location.href = ''">Pesquisar</button>
          </li>
        </ul>
        
        <h2>Autoria</h2>
        <ul>
          <li>
            <button onclick = "location.href = '../class_autoria/listar.php'">Listar</button>
          </li>
          <li>
            <button onclick = "location.href = '../class_autoria/cadastrar.php'">Incluir</button>
          </li>
          <li>
            <button onclick = "location.href = ''">Alterar</button>
          </li>
          <li>
            <button onclick = "location.href = ''">Excluir</button>
          </li>
          <li>
            <button onclick = "location.href = ''">Pesquisar</button>
          </li>
        </ul>
          
        <h2>Autor</h2>
        <ul>
          <li>
            <button onclick = "location.href = '../class_autor/listar.php'">Listar</button>
          </li>
          <li>
            <button onclick = "location.href = '../class_autor/cadastrar.php'">Incluir</button>
          </li>
          <li>
            <button onclick = "location.href = ''">Alterar</button>
          </li>
          <li>
            <button onclick = "location.href = ''">Excluir</button>
          </li>
          <li>
            <button onclick = "location.href = ''">Pesquisar</button>
          </li>
        </ul>
      </div>
    </div>
  </header>
</body>

</html>