<?php if(!isset($_SESSION))session_start();if(!isset($_SESSION['UsuarioID'])){session_destroy();header("Location: ../../index.php");exit;} ?>
<!doctypehtml>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <title>HelpDesk VHD WebSites</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            crossorigin="anonymous" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC">
        <link href="../css/headers.css" rel="stylesheet">
        <link href="../../img/help-desk.png" rel="shortcut icon">
        <script crossorigin="anonymous" src="https://kit.fontawesome.com/d4a766c662.js"></script>
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none
            }

            @media (min-width:768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem
                }
            }
        </style>
    </head>

    <body>
        <header>
            <div class="px-3 py-2 bg-info">
                <div class="container">
                    <div class="align-items-center d-flex flex-wrap justify-content-center justify-content-lg-start"><a
                            href="?page=inicio"
                            class="align-items-center d-flex me-lg-auto my-2 my-lg-0 text-decoration-none text-white"><img
                                alt="" src="../img/help-desk.png" style="width:70px"></a></div>
                </div>
            </div>
            <div class="px-3 py-2 border-bottom mb-3">
                <div class="log text-end"><a href="javascript:history.back()" class="btn btn-primary">Voltar</a></div>
            </div>
        </header>
        <main class="px-3 text-center">
            <h1>SOBRE</h1>
            <p class="lead"><i class="fas fa-terminal"></i> Versão: 1.0</p>
            <p class="lead"><i class="fas fa-user-edit"></i> Criador: <a href="mailto:helpdesk@vhdwebsites.com.br">Vinicius Hansen D
                    Agostini</a></p>
            <p class="lead"><i class="fa-building far"></i> Empresa: <a
                    href="https://vhdwebsites.com.br">VHD WebSites</a></p>
            <p class="lead"><i class="fas fa-database"></i> Banco de dados: MySQL Community Server - GPL 8.0.25</p>
            <p class="lead"><i class="fas fa-code"></i> Source: HTML, CSS, JavaScript, Jquery, AJAX, PHP</p>
            </p>
        </main>
        <footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  
</footer>
    </body>