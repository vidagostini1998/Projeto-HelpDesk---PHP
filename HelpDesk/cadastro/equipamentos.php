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
        while($linha1=mysqli_fetch_array($consulta_m_equipamento)){
            if($_SESSION['UsuarioID'] == $linha1['user']){
                if($linha1['consultar']==1){
                }
                else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=inicio_helpdesk';</script>";
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
            }
        }
      
        include('./HelpDesk/header/header3.php');
        ?>
<div class="px-3 py-2 border-bottom mb-3">


  <div class="text-end log">
    <a href="?page=inicio_helpdesk" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
  </div>
</div>
</header>

<div class="container-fluid">
  <h2 class="text-center">Equipamentos</h2>

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="sbo-tab" data-bs-toggle="tab" data-bs-target="#sbo" type="button" role="tab"
        aria-controls="sbo" aria-selected="true">SBO</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pira-tab" data-bs-toggle="tab" data-bs-target="#pira" type="button" role="tab"
        aria-controls="pira" aria-selected="false">Piracicaba</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="americana-tab" data-bs-toggle="tab" data-bs-target="#americana" type="button"
        role="tab" aria-controls="americana" aria-selected="false">Americana</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="sp-tab" data-bs-toggle="tab" data-bs-target="#sp" type="button" role="tab"
        aria-controls="sp" aria-selected="false">SP</button>
    </li>


  </ul>

  <div class="tab-content">
    <br>
    <a <?php echo $criar; ?> class="btn btn-primary" href="?page=adc_equi"><i class="fas fa-plus-circle"></i></a>
    <div class="tab-pane active table2-over" id="sbo" role="tabpanel" aria-labelledby="sbo-tab">
      <div class="">
        <br>
        <table class="table table-hover text-center" id="table2">

          <thead>
            <tr>
              <th>Patrimonio</th>
              <th>Data da Inclusão</th>
              <th>Nome</th>
              <th>Categoria</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Nº Serie</th>
              <th>Fornecedor</th>
              <th>Referencia</th>
              <th>OBS</th>
              <th>Situacão</th>
              <th>Motivo</th>
              <th>Local</th>
              <th>Filial</th>
              <th>Incluido por</th>


            </tr>
          </thead>
          <tbody>
            <?php 
        include('./db.php');
          while($linha = mysqli_fetch_array($consulta_equip_sbo)){
            if($linha['situacao'] == 1){
              echo '<tr class="bg-danger text-white"><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
              echo '<td>'.$linha['data_inclu'].'</td>';
              echo '<td>'.$linha['nome'].'</td>';
              echo '<td>'.$linha['nome_cate'].'</td>';
              echo '<td>'.$linha['marca'].'</td>';
              echo '<td>'.$linha['modelo'].'</td>';
              echo '<td>'.$linha['n_serie'].'</td>';
              echo '<td>'.$linha['fornecedor'].'</td>';
              echo '<td>'.$linha['ref'].'</td>';
              echo '<td>'.$linha['obs_patrimonio'].'</td>';
              echo '<td>Inativo</td>';
              echo '<td>'.$linha['motivo_situ'].'</td>';
              echo '<td>'.$linha['nome_local'].'</td>';
              echo '<td>'.$linha['nome_filial'].'</td>';
              echo '<td>'.$linha['nome_user'].'</td> </tr>';
            }
          else if($linha['situacao'] == 0){
            echo '<tr><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
            echo '<td>'.$linha['data_inclu'].'</td>';
            echo '<td>'.$linha['nome'].'</td>';
            echo '<td>'.$linha['nome_cate'].'</td>';
            echo '<td>'.$linha['marca'].'</td>';
            echo '<td>'.$linha['modelo'].'</td>';
            echo '<td>'.$linha['n_serie'].'</td>';
            echo '<td>'.$linha['fornecedor'].'</td>';
            echo '<td>'.$linha['ref'].'</td>';
            echo '<td>'.$linha['obs_patrimonio'].'</td>';
            echo '<td>Ativo</td>';
            echo '<td>'.$linha['motivo_situ'].'</td>';
            echo '<td>'.$linha['nome_local'].'</td>';
            echo '<td>'.$linha['nome_filial'].'</td>';
            echo '<td>'.$linha['nome_user'].'</td> </tr> ';
          }
          else if($linha['situacao'] == 2){
            echo '<tr class="bg-warning"><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
            echo '<td>'.$linha['data_inclu'].'</td>';
            echo '<td>'.$linha['nome'].'</td>';
            echo '<td>'.$linha['nome_cate'].'</td>';
            echo '<td>'.$linha['marca'].'</td>';
            echo '<td>'.$linha['modelo'].'</td>';
            echo '<td>'.$linha['n_serie'].'</td>';
            echo '<td>'.$linha['fornecedor'].'</td>';
            echo '<td>'.$linha['ref'].'</td>';
            echo '<td>'.$linha['obs_patrimonio'].'</td>';
            echo '<td>Em Manutenção</td>';
            echo '<td>'.$linha['motivo_situ'].'</td>';
            echo '<td>'.$linha['nome_local'].'</td>';
            echo '<td>'.$linha['nome_filial'].'</td>';
            echo '<td>'.$linha['nome_user'].'</td> </tr> ';
          }
        }
        ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="tab-pane table2-over" id="pira" role="tabpanel" aria-labelledby="pira-tab">
      <div class="">
        <br>
        <table class="table table-hover text-center" id="table4">
          <thead>
            <tr>
              <th>Patrimonio</th>
              <th>Data da Inclusão</th>
              <th>Nome</th>
              <th>Categoria</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Nº Serie</th>
              <th>Fornecedor</th>
              <th>Referencia</th>
              <th>OBS</th>
              <th>Situacão</th>
              <th>Motivo</th>
              <th>Local</th>
              <th>Filial</th>
              <th>Incluido por</th>


            </tr>
          </thead>
          <tbody>

            <?php 
        include('./db.php');
          while($linha = mysqli_fetch_array($consulta_equip_pira)){
            if($linha['situacao'] == 1){
              echo '<tr class="bg-danger text-white"><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
              echo '<td>'.$linha['data_inclu'].'</td>';
              echo '<td>'.$linha['nome'].'</td>';
              echo '<td>'.$linha['nome_cate'].'</td>';
              echo '<td>'.$linha['marca'].'</td>';
              echo '<td>'.$linha['modelo'].'</td>';
              echo '<td>'.$linha['n_serie'].'</td>';
              echo '<td>'.$linha['fornecedor'].'</td>';
              echo '<td>'.$linha['ref'].'</td>';
              echo '<td>'.$linha['obs_patrimonio'].'</td>';
              echo '<td>Inativo</td>';
              echo '<td>'.$linha['motivo_situ'].'</td>';
              echo '<td>'.$linha['nome_local'].'</td>';
              echo '<td>'.$linha['nome_filial'].'</td>';
              echo '<td>'.$linha['nome_user'].'</td> </tr>';
            }
          else if($linha['situacao'] == 0){
            echo '<tr><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
            echo '<td>'.$linha['data_inclu'].'</td>';
            echo '<td>'.$linha['nome'].'</td>';
            echo '<td>'.$linha['nome_cate'].'</td>';
            echo '<td>'.$linha['marca'].'</td>';
            echo '<td>'.$linha['modelo'].'</td>';
            echo '<td>'.$linha['n_serie'].'</td>';
            echo '<td>'.$linha['fornecedor'].'</td>';
            echo '<td>'.$linha['ref'].'</td>';
            echo '<td>'.$linha['obs_patrimonio'].'</td>';
            echo '<td>Ativo</td>';
            echo '<td>'.$linha['motivo_situ'].'</td>';
            echo '<td>'.$linha['nome_local'].'</td>';
            echo '<td>'.$linha['nome_filial'].'</td>';
            echo '<td>'.$linha['nome_user'].'</td> </tr> ';
          }
          else if($linha['situacao'] == 2){
            echo '<tr class="bg-warning"><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
            echo '<td>'.$linha['data_inclu'].'</td>';
            echo '<td>'.$linha['nome'].'</td>';
            echo '<td>'.$linha['nome_cate'].'</td>';
            echo '<td>'.$linha['marca'].'</td>';
            echo '<td>'.$linha['modelo'].'</td>';
            echo '<td>'.$linha['n_serie'].'</td>';
            echo '<td>'.$linha['fornecedor'].'</td>';
            echo '<td>'.$linha['ref'].'</td>';
            echo '<td>'.$linha['obs_patrimonio'].'</td>';
            echo '<td>Em Manutenção</td>';
            echo '<td>'.$linha['motivo_situ'].'</td>';
            echo '<td>'.$linha['nome_local'].'</td>';
            echo '<td>'.$linha['nome_filial'].'</td>';
            echo '<td>'.$linha['nome_user'].'</td> </tr> ';
          }

        }
        ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="tab-pane table2-over" id="americana" role="tabpanel" aria-labelledby="americana-tab">
      <div class="">
        <br>
        <table class="table table-hover text-center" id="table5">
          <thead>
            <tr>
              <th>Patrimonio</th>
              <th>Data da Inclusão</th>
              <th>Nome</th>
              <th>Categoria</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Nº Serie</th>
              <th>Fornecedor</th>
              <th>Referencia</th>
              <th>OBS</th>
              <th>Situacão</th>
              <th>Motivo</th>
              <th>Local</th>
              <th>Filial</th>
              <th>Incluido por</th>


            </tr>
          </thead>
          <tbody>
            <?php 
        include('./db.php');
          while($linha = mysqli_fetch_array($consulta_equip_americana)){
            if($linha['situacao'] == 1){
              echo '<tr class="bg-danger text-white"><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
              echo '<td>'.$linha['data_inclu'].'</td>';
              echo '<td>'.$linha['nome'].'</td>';
              echo '<td>'.$linha['nome_cate'].'</td>';
              echo '<td>'.$linha['marca'].'</td>';
              echo '<td>'.$linha['modelo'].'</td>';
              echo '<td>'.$linha['n_serie'].'</td>';
              echo '<td>'.$linha['fornecedor'].'</td>';
              echo '<td>'.$linha['ref'].'</td>';
              echo '<td>'.$linha['obs_patrimonio'].'</td>';
              echo '<td>Inativo</td>';
              echo '<td>'.$linha['motivo_situ'].'</td>';
              echo '<td>'.$linha['nome_local'].'</td>';
              echo '<td>'.$linha['nome_filial'].'</td>';
              echo '<td>'.$linha['nome_user'].'</td> </tr>';
            }
          else if($linha['situacao'] == 0){
            echo '<tr><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
            echo '<td>'.$linha['data_inclu'].'</td>';
            echo '<td>'.$linha['nome'].'</td>';
            echo '<td>'.$linha['nome_cate'].'</td>';
            echo '<td>'.$linha['marca'].'</td>';
            echo '<td>'.$linha['modelo'].'</td>';
            echo '<td>'.$linha['n_serie'].'</td>';
            echo '<td>'.$linha['fornecedor'].'</td>';
            echo '<td>'.$linha['ref'].'</td>';
            echo '<td>'.$linha['obs_patrimonio'].'</td>';
            echo '<td>Ativo</td>';
            echo '<td>'.$linha['motivo_situ'].'</td>';
            echo '<td>'.$linha['nome_local'].'</td>';
            echo '<td>'.$linha['nome_filial'].'</td>';
            echo '<td>'.$linha['nome_user'].'</td> </tr> ';
          }
          else if($linha['situacao'] == 2){
            echo '<tr class="bg-warning"><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
            echo '<td>'.$linha['data_inclu'].'</td>';
            echo '<td>'.$linha['nome'].'</td>';
            echo '<td>'.$linha['nome_cate'].'</td>';
            echo '<td>'.$linha['marca'].'</td>';
            echo '<td>'.$linha['modelo'].'</td>';
            echo '<td>'.$linha['n_serie'].'</td>';
            echo '<td>'.$linha['fornecedor'].'</td>';
            echo '<td>'.$linha['ref'].'</td>';
            echo '<td>'.$linha['obs_patrimonio'].'</td>';
            echo '<td>Em Manutenção</td>';
            echo '<td>'.$linha['motivo_situ'].'</td>';
            echo '<td>'.$linha['nome_local'].'</td>';
            echo '<td>'.$linha['nome_filial'].'</td>';
            echo '<td>'.$linha['nome_user'].'</td> </tr> ';
          }
        }
        ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="tab-pane table2-over" id="sp" role="tabpanel" aria-labelledby="sp-tab">
      <div class="">
        <br>
        <table class="table table-hover text-center" id="table6">
          <thead>
            <tr>
              <th>Patrimonio</th>
              <th>Data da Inclusão</th>
              <th>Nome</th>
              <th>Categoria</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Nº Serie</th>
              <th>Fornecedor</th>
              <th>Referencia</th>
              <th>OBS</th>
              <th>Situacão</th>
              <th>Motivo</th>
              <th>Local</th>
              <th>Filial</th>
              <th>Incluido por</th>


            </tr>
          </thead>
          <tbody>
            <?php 
        include('./db.php');
          while($linha = mysqli_fetch_array($consulta_equip_sp)){
            if($linha['situacao'] == 1){
              echo '<tr class="bg-danger text-white"><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
              echo '<td>'.$linha['data_inclu'].'</td>';
              echo '<td>'.$linha['nome'].'</td>';
              echo '<td>'.$linha['nome_cate'].'</td>';
              echo '<td>'.$linha['marca'].'</td>';
              echo '<td>'.$linha['modelo'].'</td>';
              echo '<td>'.$linha['n_serie'].'</td>';
              echo '<td>'.$linha['fornecedor'].'</td>';
              echo '<td>'.$linha['ref'].'</td>';
              echo '<td>'.$linha['obs_patrimonio'].'</td>';
              echo '<td>Inativo</td>';
              echo '<td>'.$linha['motivo_situ'].'</td>';
              echo '<td>'.$linha['nome_local'].'</td>';
              echo '<td>'.$linha['nome_filial'].'</td>';
              echo '<td>'.$linha['nome_user'].'</td> </tr>';
            }
          else if($linha['situacao'] == 0){
            echo '<tr><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
            echo '<td>'.$linha['data_inclu'].'</td>';
            echo '<td>'.$linha['nome'].'</td>';
            echo '<td>'.$linha['nome_cate'].'</td>';
            echo '<td>'.$linha['marca'].'</td>';
            echo '<td>'.$linha['modelo'].'</td>';
            echo '<td>'.$linha['n_serie'].'</td>';
            echo '<td>'.$linha['fornecedor'].'</td>';
            echo '<td>'.$linha['ref'].'</td>';
            echo '<td>'.$linha['obs_patrimonio'].'</td>';
            echo '<td>Ativo</td>';
            echo '<td>'.$linha['motivo_situ'].'</td>';
            echo '<td>'.$linha['nome_local'].'</td>';
            echo '<td>'.$linha['nome_filial'].'</td>';
            echo '<td>'.$linha['nome_user'].'</td> </tr> ';
          }
          else if($linha['situacao'] == 2){
            echo '<tr class="bg-warning"><td><a '.$alterar.' href="?page=alter_equipamento&id='.$linha['id_patrimonio'].'" class="btn btn-success btn-lg">'.$linha['patrimonio'].'</a></td> ';
            echo '<td>'.$linha['data_inclu'].'</td>';
            echo '<td>'.$linha['nome'].'</td>';
            echo '<td>'.$linha['nome_cate'].'</td>';
            echo '<td>'.$linha['marca'].'</td>';
            echo '<td>'.$linha['modelo'].'</td>';
            echo '<td>'.$linha['n_serie'].'</td>';
            echo '<td>'.$linha['fornecedor'].'</td>';
            echo '<td>'.$linha['ref'].'</td>';
            echo '<td>'.$linha['obs_patrimonio'].'</td>';
            echo '<td>Em Manutenção</td>';
            echo '<td>'.$linha['motivo_situ'].'</td>';
            echo '<td>'.$linha['nome_local'].'</td>';
            echo '<td>'.$linha['nome_filial'].'</td>';
            echo '<td>'.$linha['nome_user'].'</td> </tr> ';
          }
        }
        ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

  </div>

  <script>
    var firstTabEl = document.querySelector('#myTab li:last-child a')
    var firstTab = new bootstrap.Tab(firstTabEl)

    firstTab.show()
  </script>


</div>


<?php include('./HelpDesk/cadastro/footer.php'); ?>

</body>

</html>