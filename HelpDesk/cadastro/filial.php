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
        while($linha1=mysqli_fetch_array($consulta_m_filial)){
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
    <a <?php echo $criar; ?> class="btn btn-primary" href="?page=adc_filial"><i class="fas fa-plus-circle"></i></a>
    <a href="?page=inicio_helpdesk" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
  </div>
</div>
</header>


<div class="container-fluid">
  <h2 class="text-center">Filiais</h2>
  <table class="table table-hover text-center" id="table2">
    <thead>
      <tr>
        <th>ID</th>
        <th>Filial</th>
        <th>Data da Inclusão</th>
        <th>Incluido por</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php 
          include('./db.php');
            while($linha = mysqli_fetch_array($consulta_filial)){
              
              echo '<tr><td><a '.$alterar.' href="?page=alterar_filial&id='.$linha['id_filial'].'" class="btn btn-success btn-lg" >'.$linha['id_filial'].'</a></td> ';
              echo '<td>'.$linha['nome_filial'].'</td>';
              echo '<td>'.$linha['data_adc'].'</td>';
              echo '<td>'.$linha['nome'].'</td>';
              echo '<td> <a '.$excluir.' href="?page=excluir_filial&id='.$linha['id_filial'].'"><img src="./img/excluir.png"></a></td>';
              
            }
          ?>



    </tbody>
  </table>
</div>

<?php include('./HelpDesk/cadastro/footer.php'); ?>

</body>

</html>