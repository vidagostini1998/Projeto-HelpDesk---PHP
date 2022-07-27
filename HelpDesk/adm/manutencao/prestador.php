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
        while($linha1=mysqli_fetch_array($consulta_m_gmanutencao)){
            if($_SESSION['UsuarioID'] == $linha1['user']){
                if($linha1['consultar']==1){
                }
                else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=adm';</script>";
                }
                if($linha1['criar']==1){
                    $criar = "";
                }else{
                    $criar="style='pointer-events:none;'";
                }
                if($linha1['alterar'] == 1){
                    $alterar = "";
                }else{
                    $alterar = "style='pointer-events:none;'";
                }
                if($linha1['excluir'] == 1){
                    $excluir = "";
                }else{
                    $excluir = "style='pointer-events:none;'";
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
                    <a href="#"
                        class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <img src="../../img/help-desk.png" alt="" style="width: 70px;">
                    </a>
                </div>
            </div>
        </div>
        <div class="px-3 py-2 border-bottom mb-3">
            <div class="text-end log">
                <a class="btn btn-primary" <?php echo $criar; ?> href="?page=adc_prestador"><i class="fas fa-plus-circle"></i></a>
                <button class="btn btn-primary" onclick="recarregar()"><i class="fas fa-sync-alt"></i></button>
                <a class="btn btn-primary" href="?page=adm"><i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>
    </header>

    <body>


        <div class="container-fluid">
            <h2 style="padding-bottom:20px;">Lista Prestadores</h2>
            <table class="table table-hover text-center" id="table2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data da Inclusão</th>
                        <th>Incluido por</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
          include('./db.php');
            while($linha = mysqli_fetch_array($consulta_prestador2)){
              
              echo '<tr><td><a '.$alterar.' href="?page=alterar_prestador&id='.$linha['id_prestador'].'" class="btn btn-success btn-lg" >'.$linha['id_prestador'].'</a></td> ';
              echo '<td>'.$linha['nome_prestador'].'</td>';
              echo '<td>'.$linha['data'].'</td>';
              echo '<td>'.$linha['nome'].'</td>';
              echo '<td> <a '.$excluir.' href="?page=excluir_prestador&id='.$linha['id_prestador'].'"><img src="./img/excluir.png"></a></td>';
              
            }
          ?>



                </tbody>
            </table>
        </div>

        <?php include('./HelpDesk/adm/manutencao/footer.php'); ?>

    </body>

</html>