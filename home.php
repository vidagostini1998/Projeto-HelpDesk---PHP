<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelpDesk VHD WebSites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="/css/headers.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/help-desk.png" />
    <script src="https://kit.fontawesome.com/d4a766c662.js" crossorigin="anonymous"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body>

    <header>
        <div class="px-3 py-2 bg-info">
            <div class="container-fluid">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                    <a href="/"
                        class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <img src="../img/help-desk.png" alt="" style="width: 70px;">

                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0">
                        <li>
                            <a href="/" class="nav-link fs-5 text-white menu"><i class="fas fa-home"></i> Inicio</a>
                        </li>
                        <li>
                            <a class="nav-link text-white menu fs-5" href="?page=inicio_helpdesk"><i
                                    class="fas fa-cog"></i> Manutenção</a>
                        </li>
                        <li>
                            <a class="nav-link text-white menu fs-5" href="?page=inicio_adm"><i
                                    class="fas fa-user-shield"></i> Administração</a>
                        </li>
                        <li>
                            <a href="?page=sobre" class="nav-link text-white menu fs-5"><i
                                    class="fas fa-info-circle"></i> Sobre</a>
                        </li>
                        <li>
                            <a href="../logout.php" class="nav-link text-white menu fs-5"><i
                                    class="fas fa-sign-out-alt"></i>Sair</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </header>

   

    <footer>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </footer>
</body>

</html>