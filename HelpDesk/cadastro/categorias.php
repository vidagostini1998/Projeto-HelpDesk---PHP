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
        while($linha1=mysqli_fetch_array($consulta_m_categoria)){
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
                if($linha1['excluir'] == 1){
                    $excluir = "";
                }else{
                    $excluir = "style='pointer-events:none;'";
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
  <h2 class="text-center" style="padding-bottom:20px;">Categorias</h2>

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
        aria-controls="home" aria-selected="true">Equipamentos</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
        aria-controls="profile" aria-selected="false">Insumos</button>
    </li>

  </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <br>
      <a <?php echo $criar; ?> class="btn btn-primary" href="?page=cad_catequi"><i class="fas fa-plus-circle"></i></a>
      <br><br>
      <table class="table table-hover text-center" id="table2">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data Inclusão</th>
            <th>Incluido por</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php 
          include('./db.php');
            while($linha = mysqli_fetch_array($consulta_categoria_equi)){
              
              echo '<tr><td><a '.$alterar.' href="?page=alter_ca_equip&id='.$linha['id_cate'].'" class="btn btn-success btn-lg"  >'.$linha['id_cate'].'</a></td> ';
              echo '<td>'.$linha['nome_cate'].'</td>';
              echo '<td>'.$linha['data_cad'].'</td>';
              echo '<td>'.$linha['nome'].'</td>';
              echo '<td> <a '.$excluir.' href="?page=excluir_equip&id='.$linha['id_cate'].'"><img src="./img/excluir.png"></a></td>';
            }
          ?>
        </tbody>
      </table>
    </div>
    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <br>
      <a <?php echo $criar; ?> class="btn btn-primary" href="?page=cad_catinsu"><i class="fas fa-plus-circle"></i></a>
      <br><br>
      <table class="table table-hover text-center" id="table4">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data Inclusão</th>
            <th>Incluido por</th>
            <th></th>

          </tr>
        </thead>
        <tbody>
          <?php 
          include('./db.php');
            while($linha = mysqli_fetch_array($consulta_categoria_insumos)){
              
              echo '<tr><td><a '.$alterar.' href="?page=alter_ca_insu&id='.$linha['id_insu'].'" class="btn btn-success btn-lg"  >'.$linha['id_insu'].'</a></td> ';
              echo '<td>'.$linha['nome_cate_insu'].'</td>';
              echo '<td>'.$linha['data_adc'].'</td>';
              echo '<td>'.$linha['nome'].'</td>';
              echo '<td> <a '.$excluir.' href="?page=excluir_insu&id='.$linha['id_insu'].'"><img src="./img/excluir.png"></a></td>';
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

<?php include('./HelpDesk/cadastro/footer.php'); ?>

</body>

</html>