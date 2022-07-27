<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HelpDesk VHD WebSites</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="shortcut icon" href="../../img/help-desk.png" />
  <script src="https://kit.fontawesome.com/d4a766c662.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="../css/headers.css" rel="stylesheet">
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
          <a href="#" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <img src="../img/help-desk.png" alt="" style="width: 70px;">
          </a>
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0">
            <li>
              <a href="?page=inicio_helpdesk" class="nav-link fs-5 text-white menu"><i class="fas fa-home"></i>
                Inicio</a>
            </li>
            <li>
              <a href="?page=chamados" class="nav-link fs-5 text-white menu"><i class="fas fa-book-open"></i>
                Chamados</a>
            </li>
            <li class=" dropdown ">
              <a class="nav-link dropdown-toggle text-white menu fs-5" href="#" id="dropdown2" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-tools"></i> Manutenções</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown2">
                <li><a class="dropdown-item" href="?page=consulta_manutencao">Consulta</a></li>
                <li><a class="dropdown-item" href="?page=prestador">Prestador</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <br>