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
                <a class="btn btn-primary" href="?page=adc_produto"><i class="fas fa-plus-circle"></i></a>
                <button class="btn btn-primary" onclick="recarregar()"><i class="fas fa-sync-alt"></i></button>
                <a class="btn btn-primary" href="?page=adm"><i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>
    </header>

    <body>

        <div class="container-fluid">
            <table class="table table-hover text-center" id="table2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Codigo</th>
                        <th>Fornecedor</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Total em estoque R$</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
          include('./db.php');
            while($linha = mysqli_fetch_array($consulta_produtos)){
              
              echo '<td><a href="?page=editar_produto&id='.htmlentities($linha['id_produto']).'" class="btn btn-primary btn-lg">'.htmlentities($linha['id_produto']).'</a></td> ';
              echo '<td>'.htmlentities($linha['data_adc']).'</td>';
              echo '<td>'.htmlentities($linha['nome_produto']).'</td>';
              echo '<td>'.htmlentities($linha['codigo_produto']).'</td>';
              echo '<td>'.htmlentities($linha['nome_fornecedor']).'</td>';
              echo '<td>'.htmlentities($linha['nome_cate_insu']).'</td>';
              $id = $linha['id_produto'];

              $query_qtd_entrada="SELECT *, SUM(quantidade) AS qtd_entrada, SUM(valor_total) AS total FROM entrada WHERE produto ='$id'";
              $consulta_qtd_entrada = mysqli_query($conexao, $query_qtd_entrada);
              
              $query_qtd_saida="SELECT *, SUM(quantidade) AS qtd_saida FROM saida WHERE produto ='$id'";
              $consulta_qtd_saida = mysqli_query($conexao, $query_qtd_saida);
              
              $linha_entrada = mysqli_fetch_array($consulta_qtd_entrada);
              $linha_saida = mysqli_fetch_array($consulta_qtd_saida);

              $qtd = $linha_entrada['qtd_entrada'] - $linha_saida['qtd_saida'];
              $valor_total = $linha_entrada['total'] - ($linha_entrada['valor_unitario'] * $linha_saida['qtd_saida'] );

                
              echo '<td>'.htmlentities($qtd).'</td>';
              echo '<td>'.htmlentities($valor_total).'</td> </tr> ';
              
            }
          ?>
                    </tr>
                </tbody>

            </table>
        </div>

        <?php
      include ('./HelpDesk/footer.php')
    ?>

    </body>

</html>