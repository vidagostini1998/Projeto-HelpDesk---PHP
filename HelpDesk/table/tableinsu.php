<?php
include('../../Administracao/Usuarios/permissoes/db_perm.php');
while($linha1=mysqli_fetch_array($consulta_m_chamado)){
    if($_GET['id'] == $linha1['user']){
      if($linha1['alterar'] == 1){
        $alterar = "";
    }else{
        $alterar = "style='pointer-events:none;'";
    }
    }
}
?>

<h3 style="padding-bottom:20px;">Lista de chamados Insumos</h3>

<table class="table table-hover text-center" id="table1">
  <thead>
    <tr>
      <th>ID</th>
      <th>Data do Chamado</th>
      <th>Solicitante</th>
      <th>Descrição</th>
      <th>OBS</th>
      <th>Categoria</th>
      <th>Patrimonio</th>
      <th>Local</th>
      <th>Filial</th>

    </tr>
  </thead>
  <tbody>
    <?php 
          include('../../db.php');
            while($linha = mysqli_fetch_array($consulta_chamados_insu)){
              
              echo '<tr><td><a '.$alterar.' href="?page=editar_chinsu&id='.htmlentities($linha['id']).'" class="btn btn-success btn-lg">'.htmlentities($linha['id']).'</a></td> ';
              echo '<td>'.htmlentities($linha['data_chamado']).'</td>';
              echo '<td>'.htmlentities($linha['nome']).'</td>';
              echo '<td>'.htmlentities($linha['descricao']).'</td>';
              echo '<td>'.htmlentities($linha['obs']).'</td>';
              echo '<td>'.htmlentities($linha['nome_cate_insu']).'</td>';
              echo '<td>'.htmlentities($linha['patrimonio']).'</td>';
              echo '<td>'.htmlentities($linha['nome_local']).'</td>';
              echo '<td>'.htmlentities($linha['nome_filial']).'</td>';
              
              $id = $linha['id'];
            }
          ?>



  </tbody>
</table>