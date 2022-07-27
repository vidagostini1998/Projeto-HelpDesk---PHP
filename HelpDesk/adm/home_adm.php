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
include('header/header_adm.php');  

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 border-2 border-bottom border-dark">
      <h5><i class="fas fa-tools"></i> Manutenções <input class="btn btn-primary m-2" type='button'
          value='Exportar vencidos' onclick='printdiv2()' /></h5>

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="prox-tab" data-bs-toggle="tab" data-bs-target="#prox" type="button"
            role="tab" aria-controls="prox" aria-selected="true"><strong>Proximas</strong></button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="venc-tab" data-bs-toggle="tab" data-bs-target="#venc" type="button" role="tab"
            aria-controls="venc" aria-selected="true"><strong>Vencidas</strong></button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active container" id="prox" role="tabpanel" aria-labelledby="prox-tab">
          <table class="table table-hover text-center">
            <thead>
              <tr>
                <th>Patrimonio</th>
                <th>Nome</th>
                <th>Data de manutenção</th>
              </tr>
            </thead>
            <tbody>
              <?php 
          include('./db.php');
            while($linha = mysqli_fetch_array($consulta_manut_av)){ 
              echo '<tr><td><a href="?page=editar_manut&id='.htmlentities($linha['id_manut']).'" class="btn border">'.htmlentities($linha['patrimonio']).'</a></td> ';
              echo '<td>'.htmlentities($linha['nome']).'</td>';
              echo '<td class="manutencao bg-success">'.htmlentities($linha['data_manut']).'</td></tr>';
            }
          ?>
            </tbody>
          </table>
        </div>
        <div class="tab-pane container" id="venc" role="tabpanel" aria-labelledby="venc-tab">
          <table class="table table-hover text-center">
            <thead>
              <tr>
                <th>Patrimonio</th>
                <th>Nome</th>
                <th>Data de manutenção</th>
              </tr>
            </thead>
            <tbody>
              <?php 
               include('./db.php');
             while($linha = mysqli_fetch_array($consulta_manut_ve)){
              echo '<tr><td><a href="?page=editar_manut&id='.htmlentities($linha['id_manut']).'" class="btn border">'.htmlentities($linha['patrimonio']).'</a></td> ';
              echo '<td>'.htmlentities($linha['nome']).'</td>';
              echo '<td class="manutencao bg-danger">'.htmlentities($linha['data_manut']).'</td></tr>';
            }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br> <br>
    <div class="col-md-12 p-4">
      <h5><i class="fas fa-check-double"></i> Pendente Resolução</h5>
      <ul class="nav nav-tabs" id="myTab1" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="equip-tab" data-bs-toggle="tab" data-bs-target="#equip" type="button"
            role="tab" aria-controls="equip" aria-selected="true"><strong>Equipamentos</strong></button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="insu-tab" data-bs-toggle="tab" data-bs-target="#insu" type="button" role="tab"
            aria-controls="insu" aria-selected="false"><strong>Insumos</strong></button>
        </li>

      </ul>



      <div class="tab-content">
        <div class="tab-pane active table1-over" id="equip" role="tabpanel" aria-labelledby="equip">
          <table class="table table-hover text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Data Conclusão</th>
                <th>Problema</th>
                <th>Solucao</th>
                <th>Filial</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                include('./db.php');
                while($linha = mysqli_fetch_array($consulta_pend_equip)){
              
              echo '<tr><td><a href="?page=re_equip_adm&id='.htmlentities($linha['id']).'" class="btn btn-primary">'.htmlentities($linha['id']).'</a></td> ';
              echo '<td>'.htmlentities($linha['data_conclusao']).'</td>';
              echo '<td>'.htmlentities($linha['problema']).'</td>';
              echo '<td>'.htmlentities($linha['solucao']).'</td>';
              echo '<td>'.htmlentities($linha['nome_filial']).'</td></tr>';
            }
          ?>
            </tbody>
          </table>


        </div>
        <div class="tab-pane table1-over" id="insu" role="tabpanel" aria-labelledby="insu">
          <table class="table table-hover text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Data Conclusão</th>
                <th>Problema</th>
                <th>Solucao</th>
                <th>Filial</th>
              </tr>
            </thead>
            <tbody>
              <?php 
          include('./db.php');
          
            while($linha = mysqli_fetch_array($consulta_pend_insu)){
              
              echo '<tr><td><a href="?page=re_insu_adm&id='.htmlentities($linha['id']).'" class="btn btn-primary">'.htmlentities($linha['id']).'</a></td> ';
              echo '<td>'.htmlentities($linha['data_conclusao']).'</td>';
              echo '<td>'.htmlentities($linha['descricao']).'</td>';
              echo '<td>'.htmlentities($linha['solucao']).'</td>';
              //echo '<td>'.htmlentities($linha['obs']).'</td>';
              echo '<td>'.htmlentities($linha['nome_filial']).'</td></tr>';
            }
          ?>
            </tbody>
          </table>

        </div>
      </div>


    </div>
  </div>
</div>

<script>
  var firstTabEl = document.querySelector('#myTab li:last-child a')
  var firstTab = new bootstrap.Tab(firstTabEl)
  firstTab.show()
</script>

<script>
  var firstTabEl1 = document.querySelector('#myTab1 li:last-child a')
  var firstTab1 = new bootstrap.Tab(firstTabEl1)
  firstTab1.show()
</script>
<?php
include ('./HelpDesk/adm/footer.php')
?>
</body>

</html>