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
                if($linha1['alterar'] == 1){   
                }else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=consulta_manutencao';</script>";
                }
            }
        }
        include('./HelpDesk/header/header3.php');
        include('./db.php');
        ?>
<br>
<div class="border-bottom">
    <h2 class="text-center">Adicionar Prestador</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="?page=prestador" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">
<?php
    while($linha=mysqli_fetch_array($consulta_prestador2)){ 
    if($linha['id_prestador']==$_GET['id']){
?>
    <form class="row g-3" action="./HelpDesk/adm/manutencao/pro_alter_prestador.php" method="POST">
    <input type="hidden" name="id" id="id" value="<?php echo  $_GET['id']; ?>">
        <div class="col-md-2">
            <label for="data_ab" class="form-label">Data Inclusão</label>
            <input type="date" name="data_ab" class="form-control text-center" id="data_ab"
                value="<?php echo $linha['data_adc']; ?>">
        </div>
        <div class="col-md-1">
            <label for="solicitante" class="form-label">ID</label>
            <input type="text" name="solicitante" class="form-control text-center" id="solicitante" readonly
                value="<?php echo $linha['id_adc'];?>">

        </div>
        <div class="col-md-2">
            <label for="soli" class="form-label"> Solicitante </label>
            <input type="text" id="soli" class="form-control text-center" value="<?php echo $linha['nome'];?>"
                disabled>
        </div>

        <div class="col-md-6">
            <label for="nome" class="form-label">Nome Prestador</label>
            <input required name="nome" class="form-control" id="nome" placeholder="Prestador" value="<?php echo $linha['nome_prestador'];?>"></input>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success"><i class="far fa-check-circle fa-2x"></i></button>
        </div>
    </form>
    <?php   }
        }
    ?>
</div>
<?php
    include('./HelpDesk/adm/manutencao/footer_page.php');
?>
</body>

</html>