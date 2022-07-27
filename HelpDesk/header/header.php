<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manutenção</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link href="../css/headers.css" rel="stylesheet">
  <link rel="shortcut icon" href="../img/help-desk.png" />
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
            <li class=" dropdown ">
              <a class="nav-link dropdown-toggle text-white menu fs-5" href="#" id="dropdown1" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-edit"></i> Abrir chamado</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown1">
                <li><a class="dropdown-item" href="?page=abrir_chequip">Equipamentos</a></li>
                <li><a class="dropdown-item" href="?page=abrir_chinsu">Insumos</a></li>
              </ul>
            </li>
            <li>
              <a href="?page=chamados_usuario" class="nav-link fs-5 text-white menu"><i class="fas fa-book-open"></i> Meus Chamados</a>
            </li>
                <li class=" dropdown ">
              <a class="nav-link dropdown-toggle text-white menu fs-5" href="#" id="dropdown2" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-search"></i> Consulta</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown2">
                <li><a class="dropdown-item" href="?page=consulta_equi">Equipamentos</a></li>
                <li><a class="dropdown-item" href="?page=consulta_categoria">Categorias</a></li>
                <li><a class="dropdown-item" href="?page=consulta_filial">Filial</a></li>
                <li><a class="dropdown-item" href="?page=consulta_local">Local</a></li>
              </ul>
              
            </li>
            
            <li>
              <a href="?page=adm" class="nav-link text-white menu fs-5" ><i class="fas fa-users-cog"></i> Gerenciamento</a>
            </li>            
          </ul>
        </div>
      </div>
    </div>
    
    </div>
  </header>