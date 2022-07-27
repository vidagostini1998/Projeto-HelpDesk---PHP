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
                if($linha1['excluir']==1){
                }
                else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=inicio_helpdesk';</script>";
                }
            }
        }
        include('./HelpDesk/header/header3.php');
        include('./db.php');
        ?>

<script>
    function excluir() {
        var resultado = confirm("Você realmente deseja excluir a filial?");
        if (resultado == true) {
            document.getElementById("form1").submit();

        } else {
            window.location.href = "?page=consulta_filial";
        }
    }
</script>
<div class="px-3 py-2 border-bottom mb-3">
    <div class="text-end log">
        <a href="?page=consulta_filial" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid">
    <?php
    while($linha=mysqli_fetch_array($consulta_alter_filial)){ 
    if($linha['id_filial']==$_GET['id']){
?>
    <form class="row g-3" id="form1" action="./HelpDesk/delete/pro_del_filial.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $linha['id_filial']; ?>">
        <div class="col-md-2">
            <label for="data_ab" class="form-label">Data Inclusão</label>
            <input type="date" name="data_ab" class="form-control" id="data_ab"
                value="<?php echo $linha['data_adc']; ?>" readonly>
        </div>

        <div class="col-md-1">
            <label for="solicitante" class="form-label">ID</label>
            <input type="text" name="solicitante" class="form-control text-center" id="solicitante" readonly
                value="<?php echo $linha['id_adc'];?>">

        </div>
        <div class="col-md-2">
            <label for="soli" class="form-label"> Solicitante </label>
            <input type="text" id="soli" class="form-control text-center" value="<?php echo $linha['nome'];?>" disabled>
        </div>

        <div class="col-md-6">
            <label for="nome_local" class="form-label">Local</label>
            <input name="nome_local" required class="form-control" id="nome_local"
                value="<?php echo $linha['nome_filial'];?>" readonly></input>
        </div>
    </form>
    <br>
    <div class="col-md-12">
        <button onclick="excluir()" class="btn btn-danger"><i class="fas fa-minus-circle fa-2x"></i></button>
    </div>
    <?php   }
        }
    ?>
</div>
<?php
    include('./HelpDesk/delete/footer.php');
?>
</body>

</html>