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
            <div class="container-fluid">
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
                <button class="btn btn-primary" onclick="recarregar()"><i class="fas fa-sync-alt"></i></button>
                <a class="btn btn-primary" href="?page=adm"><i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>
    </header>

    <body>

        <div class="container-fluid">


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Entrada</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Saida</button>
                </li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    <a class="btn btn-primary" href="?page=adc_entrada"><i class="fas fa-plus-circle"></i></a>
                    <br><br>
                    <table class="table table-hover text-center" id="table2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Produto</th>
                                <th>Data Entrada</th>
                                <th>Quantidade</th>
                                <th>Valor Unitario R$</th>
                                <th>Valor Total R$</th>
                                <th>Inserido por</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
          include('./db.php');
            while($linha = mysqli_fetch_array($consulta_mov_entrada)){
              
              echo '<tr><td><a href="?page=alter_entrada&id='.$linha['id_entrada'].'" class="btn btn-success btn-lg"  >'.$linha['id_entrada'].'</a></td> ';
              echo '<td>'.$linha['nome_produto'].'</td>';
              echo '<td>'.$linha['data_entrada'].'</td>';
              echo '<td>'.$linha['quantidade'].'</td>';
              echo '<td>'.$linha['valor_unitario'].'</td>';
              echo '<td>'.$linha['valor_total'].'</td>';
              echo '<td>'.$linha['nome'].'</td></tr>';
              
            }
          ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br>
                    <a class="btn btn-primary" href="?page=adc_saida"><i class="fas fa-plus-circle"></i></a>
                    <br><br>
                    <table class="table table-hover text-center" id="table4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Produto</th>
                                <th>Data Saida</th>
                                <th>Quantidade</th>
                                <th>Local</th>
                                <th>Filial</th>
                                <th>Retirado por</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
          include('./db.php');
            while($linha = mysqli_fetch_array($consulta_mov_saida)){
              
              echo '<tr><td><a href="?page=alter_saida&id='.$linha['id_saida'].'" class="btn btn-success btn-lg"  >'.$linha['id_saida'].'</a></td> ';
              echo '<td>'.$linha['nome_produto'].'</td>';
              echo '<td>'.$linha['data_saida'].'</td>';
              echo '<td>'.$linha['quantidade'].'</td>';
              echo '<td>'.$linha['nome_local'].'</td>';
              echo '<td>'.$linha['nome_filial'].'</td>';
              echo '<td>'.$linha['nome'].'</td></tr>';
              
            }
          ?>
                        </tbody>
                    </table>


                </div>

            </div>

            <script>
                var firstTabEl = document.querySelector('#myTab li:last-child a')
                var firstTab = new bootstrap.Tab(firstTabEl)

                firstTab.show()
            </script>


        </div>


        <?php
      include ('./HelpDesk/footer.php')
    ?>

    </body>

</html>