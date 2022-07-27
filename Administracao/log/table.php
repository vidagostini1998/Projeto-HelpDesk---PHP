<?php if(!isset($_SESSION))session_start();if(!isset($_SESSION['UsuarioID'])){session_destroy();header("Location: ../../index.php");exit;}include('./Administracao/Headers/header_log.php');
include('./Administracao/Usuarios/permissoes/db_perm.php');

while($linha1=mysqli_fetch_array($consulta_a_log)){
    if($_SESSION['UsuarioID'] == $linha1['user']){
        if($linha1['consultar']==1){
        }else{
            echo "<script>
	alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/';
	</script>";
        }
    }
}
?>
<div class="container-fluid">
    <h2 style="padding-bottom:20px">LOG</h2>
    <table class="table table-hover text-center" id="table3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data/Hora</th>
                <th>IP</th>
                <th>Mensagem</th>
                <th>Login</th>
            </tr>
        </thead>
        <tbody>
            <?php include('./db.php');while($linha=mysqli_fetch_array($consulta_log)){echo '<tr><td>'.$linha['id'].'</td> ';echo '<td>'.$linha['hora'].'</td>';echo '<td>'.$linha['ip'].'</td>';echo '<td>'.$linha['mensagem'].'</td>';echo '<td>'.$linha['login'].'</td>';} ?>
        </tbody>
    </table>
</div><?php include('./Administracao/footer.php') ?>