<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" />

        <style>
            body {
                display: flex; 
                justify-content: center;
                align-items: center;
            }
            
            a {
                text-decoration: none;
                color:  #2b134b;
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        
        <link rel="icon" href="img/autoria.png" />
        <title>Login</title>
    </head>
    <body>
        <section>
        <script type="text/javascript">
            $(document).ready(function() {
            Swal.fire({
                title: "Usuário ou senha incorretos!",
                confirmButtonColor: " #1f945d",
                color: "#201b2c",
                
                imageUrl: "img/peixinho.gif",
                imageWidth: 200,
                imageAlt: "Peixe colorido",
                
                background: "#100d16",
            }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = 'index.php'; // Redireciona ao clicar no botão de confirmação
            }
            });
        });
        </script>
        </section>
    </body>
</html>