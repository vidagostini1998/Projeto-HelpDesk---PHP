<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: ../../index.php"); exit;
}

include('./Administracao/Usuarios/permissoes/db_perm.php');
        while($linha1=mysqli_fetch_array($consulta_m_gchamado)){
            if($_SESSION['UsuarioID'] == $linha1['user']){
                if($linha1['consultar']==1){
                }
                else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=adm';</script>";
                }
                if($linha1['alterar'] == 1){
                    $alterar = "";
                }else{
                    $alterar = "style='pointer-events:none;'";
                }
            }
        }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HelpDesk VHD WebSites</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="../css/headers.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <link rel="shortcut icon" href="../../img/help-desk.png" />
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
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="#" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <img src="../../img/help-desk.png" alt="" style="width: 70px;">
          </a>

        </div>
      </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
      <div class="text-end log">
        <button class="btn btn-primary" onclick="recarregar()"><i class="fas fa-sync-alt"></i></button>
        <a class="btn btn-primary" href="?page=adm"><i class="fas fa-arrow-circle-left"></i></a>
      </div>
    </div>
  </header>


    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
          role="tab" aria-controls="home" aria-selected="true">Equipamentos</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
          role="tab" aria-controls="profile" aria-selected="false">Insumos</button>
      </li>

    </ul>

    <div class="tab-content" id="tab">
      <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <br>
        <div class="container-fluid">
          <table class="table table-hover text-center" id="table1">
            <thead>
              <tr>
                <th>ID</th>
                <th>Data do Chamado</th>
                <th>Data da Conclusão</th>
                <th>Solicitante</th>
                <th>Problema</th>
                <th>Solução</th>
                <th>OBS</th>
                <th>Categoria</th>
                <th>Patrimonio</th>
                <th>Local</th>
                <th>Filial</th>
                <th>Situação</th>


              </tr>
            </thead>
            <tbody>
              <?php 
          include('./db.php');
            while($linha = mysqli_fetch_array($consulta_chamados_adm)){
              
              echo '<tr class="text-center"><td><a '.$alterar.' href="?page=equip_adm&id='.$linha['id'].'" class="btn btn-primary btn-lg">'.$linha['id'].'</a></td> ';
              echo '<td>'.$linha['data_ch'].'</td>';
              echo '<td>'.$linha['data_conclu'].'</td>';
              echo '<td>'.$linha['nome'].'</td>';
              echo '<td>'.$linha['problema'].'</td>';
              echo '<td>'.$linha['solucao'].'</td>';
              echo '<td>'.$linha['obs'].'</td>';
              echo '<td>'.$linha['nome_cate'].'</td>';
              echo '<td>'.$linha['patrimonio'].'</td>';
              echo '<td>'.$linha['nome_local'].'</td>';
              echo '<td>'.$linha['nome_filial'].'</td>';
              if($linha['resolvido'] == 0){
                echo '<td class="bg-danger text-white">Em aberto</td>';
              }
              else if($linha['resolvido'] == 2){
                echo '<td class="text-white bg-success">Resolvido</td>';
              }
              else if($linha['resolvido'] == 1){
                echo '<td class="text-white bg-warning">Pendente Resolução</td>';
              }
              
              
              
              $id = $linha['id'];
            }
          ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <br>
        <div class="container-fluid">
          <table class="table table-hover text-center" id="table3">
            <thead>
              <tr>
                <th>ID</th>
                <th>Data do Chamado</th>
                <th>Data da Conclusão</th>
                <th>Solicitante</th>
                <th>Descrição</th>
                <th>Solução</th>
                <th>OBS</th>
                <th>Medida</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Patrimonio</th>
                <th>Local</th>
                <th>Filial</th>
                <th>Situação</th>

              </tr>
            </thead>
            <tbody>
              <?php 
          include('./db.php');
            while($linha = mysqli_fetch_array($consulta_insu_adm)){
              
              echo '<tr class="text-center"><td><a '.$alterar.' href="?page=insu_adm&id='.$linha['id'].'" class="btn btn-success btn-lg">'.$linha['id'].'</a></td> ';
              echo '<td>'.$linha['data_ch'].'</td>';
              echo '<td>'.$linha['data_conclu'].'</td>';
              echo '<td>'.$linha['nome'].'</td>';
              echo '<td>'.$linha['descricao'].'</td>';
              echo '<td>'.$linha['solucao'].'</td>';
              echo '<td>'.$linha['obs'].'</td>';
              echo '<td>'.$linha['medida'].'</td>';
              echo '<td>'.$linha['quantidade'].'</td>';
              echo '<td>'.$linha['nome_cate_insu'].'</td>';
              echo '<td>'.$linha['patrimonio'].'</td>';
              echo '<td>'.$linha['nome_local'].'</td>';
              echo '<td>'.$linha['nome_filial'].'</td>';
              if($linha['resolvido'] == 0){
                echo '<td class="bg-danger text-white">Em aberto</td>';
              }
              else if($linha['resolvido'] == 2){
                echo '<td class="text-white bg-success">Resolvido</td>';
              }
              else if($linha['resolvido'] == 1){
                echo '<td class="text-white bg-warning">Pendente Resolução</td>';
              }
              
              $id = $linha['id'];
            }
          ?>



            </tbody>
          </table>
        </div>
      </div>

    </div>


    <script>
      var firstTabEl = document.querySelector('#myTab li:last-child a')
      var firstTab = new bootstrap.Tab(firstTabEl)

      firstTab.show()
    </script>



    <?php
      include ('./HelpDesk/adm/consultas/footer.php')
    ?>

  </body>

</html>