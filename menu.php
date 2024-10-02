<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />

    <link rel="icon" href="img/autoria.png" />
    <title>Inicial</title>
  </head>
  <body>
  <header>
      <div class="container container_header">
        <!-- opções header -->
        <div class="left">
          <button onclick = "location.href = ''">Principal</button>
          <h2>Livro</h2>
          <ul>
            <li>
              <button onclick = "location.href = 'class_livro/listar.php'">Listar</button>
            </li>
            <li>
              <button onclick = "location.href = 'class_livro/cadastrar.php'">Incluir</button>
            </li>
            <li>
              <button onclick = "location.href = 'class_livro/alterar1.php'">Alterar</button>
            </li>
            <li>
              <button onclick = "location.href = 'class_livro/excluir.php'">Excluir</button>
            </li>
            <li>
              <button onclick = "location.href = 'class_livro/consultar.php'">Pesquisar</button>
            </li>
          </ul>
          
          <h2>Autoria</h2>
          <ul>
            <li>
              <button onclick = "location.href = 'class_autoria/listar.php'">Listar</button>
            </li>
            <li>
              <button onclick = "location.href = 'class_autoria/cadastrar.php'">Incluir</button>
            </li>
            <li>
              <button onclick = "location.href = ''">Alterar</button>
            </li>
            <li>
              <button onclick = "location.href = 'class_autoria/excluir.php'">Excluir</button>
            </li>
            <li>
              <button onclick = "location.href = 'class_autoria/consultar.php'">Pesquisar</button>
            </li>
          </ul>
            
          <h2>Autor</h2>
          <ul>
            <li>
              <button onclick = "location.href = 'class_autor/listar.php'">Listar</button>
            </li>
            <li>
              <button onclick = "location.href = 'class_autor/cadastrar.php'">Incluir</button>
            </li>
            <li>
              <button onclick = "location.href = ''">Alterar</button>
            </li>
            <li>
              <button onclick = "location.href = 'class_autor/excluir.php'">Excluir</button>
            </li>
            <li>
              <button onclick = "location.href = 'class_autor/consultar.php'">Pesquisar</button>
            </li>
          </ul>
        </div>
      </div>
    </header>
    
    <section class="right">
        <img src="img/Ocean.svg" class="right-image" alt="ocean">
    </section>
  </body>
</html>
