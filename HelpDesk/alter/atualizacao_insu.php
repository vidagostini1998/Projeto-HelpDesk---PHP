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
        while($linha1=mysqli_fetch_array($consulta_m_chamado)){
            if($_SESSION['UsuarioID'] == $linha1['user']){
                if($linha1['alterar'] == 1){
                    
                }else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=inicio_helpdesk';</script>";
                }
            }
        }
        include('./HelpDesk/header/header3.php');
        include('./db.php');
        ?>
<div class="px-3 py-2 border-bottom mb-3">
    <div class="text-end log">
        <a href="?page=editar_chinsu&id=<?php echo $_GET['id'];  ?>" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid">
    
    <form class="row g-3" action="./HelpDesk/alter/pro_atua_insu.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <div class="col-md-2">
            <label for="data_ab" class="form-label">Data Inclusão</label>
            <input type="datetime" name="data_ab" class="form-control text-center" id="data_ab"
                value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>
        </div>

        <div class="col-md-1">
            <label for="solicitante" class="form-label">ID</label>
            <input type="text" name="solicitante" class="form-control text-center" id="solicitante" readonly
                value="<?php echo $_SESSION['UsuarioID'];?>">

        </div>
        <div class="col-md-2">
            <label for="soli" class="form-label"> Nome </label>
            <input type="text" id="soli" class="form-control text-center" value="<?php echo $_SESSION['UsuarioNome'];?>" disabled>
        </div>

        <div class="col-md-6">
            <label for="nome_local" class="form-label">Atualização</label>
            <textarea name="atualizacao" id="atualizacao" class="form-control" rows="3"></textarea>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success"><i class="far fa-check-circle fa-2x"></i></button>
        </div>
    </form>
    
</div>
<?php
    include('./HelpDesk/alter/footer.php');
?>
</body>

</html>