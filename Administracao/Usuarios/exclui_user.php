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
        include('./Administracao/Headers/header3.php');
        include('./db.php');
        include('./Administracao/Usuarios/permissoes/db_perm.php');
        while($linha1=mysqli_fetch_array($consulta_a_user)){
            if($_SESSION['UsuarioID'] == $linha1['user']){
                if($linha1['excluir']==1){
                    
                }else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=inicio_adm';</script>";
                }
                
            }
        }
        ?>
<script>
    function excluir() {
        var resultado = confirm("Você realmente deseja desabilitar o usuario?");
        if (resultado == true) {
            document.getElementById("form1").submit();

        } else {
            window.location.href = "?page=usuarios";
        }
    }
</script>
<br>
<div class="border-bottom">
    <h2 class="text-center">Desabilitar Usuario</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="?page=usuarios" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">
<?php
    while($linha=mysqli_fetch_array($consulta_users)){ 
    if($linha['id']==$_GET['id']){
?>
    <form class="row g-3" id="form1" action="./Administracao/Usuarios/pro_del_user.php" method="POST">
    <input type="hidden" name="id" id="id" value="<?php echo $linha['id']; ?>">
        <div class="col-md-2">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" readonly class="form-control" value="<?php echo $linha['nome']; ?>" id="nome" required>
        </div>
        <div class="col-md-2">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" readonly name="email" class="form-control" id="email" value="<?php echo $linha['email']; ?>">

        </div>

        <div class="col-md-2">
            <label for="usuario" class="form-label"> Usuario </label>
            <input type="text" readonly id="usuario" name="usuario" class="form-control" value="<?php echo $linha['user']; ?>" required>
        </div>

        <div class="col-md-2">
            <label for="senha" class="form-label">Senha</label>
            <input required readonly name="senha" type="password" class="form-control" id="senha" value="<?php echo $linha['pass']; ?>"></input>
        </div>
        <div class="col-md-2">
            <label for="senha" class="form-label">Tipo de Usuario</label>
            <select disabled name="tipo" class="form-select" id="tipo" requireds>
                <option>Selecione</option>
                <?php
                $select="";
                $select1="";
                $select2="";
                $select3="";
                    if($linha['tipo'] == 1){
                        $select= "selected";
                    }
                    else if($linha['tipo'] == 2){
                        $select1 = "selected";
                    }
                    else if($linha['tipo'] == 3){
                        $select2="selected";
                    }
                    else if($linha['tipo'] == 4){
                        $select3 = "selected";
                    }
                ?>
                <option <?php echo $select;?>  value="1">Administrador</option>
                <option <?php echo $select3;?> value="4">Estoque</option>
                <option <?php echo $select1;?>  value="2">Entregador</option>
                <option <?php echo $select2;?>  value="3">Padrão</option>
            </select>
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
    include('./Administracao/Usuarios/footer_page.php');
?>
</body>

</html>