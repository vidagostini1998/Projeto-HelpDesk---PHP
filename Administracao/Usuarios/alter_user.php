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
        while($linha1=mysqli_fetch_array($consulta_a_user)){
            if($_SESSION['UsuarioID'] == $linha1['user']){
                if($linha1['alterar']==1){
                    
                }else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=inicio_adm';</script>";
                }
                
            }
        }
        include('./Administracao/Headers/header3.php');
        include('./db.php');
        
        ?>
<br>
<div class="border-bottom">
    <h2 class="text-center">Alterar Usuario</h2>
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
    <form class="row g-3" id="form1" action="./Administracao/Usuarios/pro_alter_user.php" method="POST">
        <input type="hidden" name="id" id="id" value="<?php echo $linha['id']; ?>">
        <div class="col-md-2">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $linha['nome']; ?>" id="nome"
                required>
        </div>
        <div class="col-md-2">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo $linha['email']; ?>">

        </div>

        <div class="col-md-2">
            <label for="usuario" class="form-label"> Usuario </label>
            <input type="text" id="usuario" name="usuario" class="form-control" value="<?php echo $linha['user']; ?>"
                required>
        </div>

        <div class="col-md-2">
            <label for="senha" class="form-label">Senha</label>
            <input required name="senha" type="password" class="form-control" id="senha"
                value="<?php echo $linha['pass']; ?>"></input>
        </div>
        <div class="col-md-12 text-center mt-4">
            <label for="" class="form-label">
                <h4>Permissões:</h4>
            </label>

        </div>


        <div class="col-md-4 container border rounded text-center">
            <label for="" class="form-label">
                <h5>Administração</h5>
            </label>
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th>Modulos</th>
                        <th>Criar</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                        <th>Consultar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            include('./Administracao/Usuarios/permissoes/db_perm.php');
            while($perm1=mysqli_fetch_array($consulta_a_user)){
                if($perm1['user'] == $linha['id'] ){
                    ?>
                    <tr>
                        <td>
                            <label for="" class="form-label">Usuarios</label>
                        </td>
                        <?php
                            for($i=1;$i<=4;$i++){
                                if($perm1['criar'] == 1 && $i==1){
                                    $check = "checked";
                                }
                                else if($perm1['alterar'] == 1 && $i==2){
                                    $check = "checked";
                                }
                                else if($perm1['excluir'] == 1 && $i==3){
                                    $check = "checked";
                                }
                                else if($perm1['consultar'] == 1 && $i==4){
                                    $check = "checked";
                                }
                                else{
                                    $check = "";
                                }
                            ?>
                        <td>
                            <input class="form-check-input" <?php echo $check;?> type="checkbox" name="user<?php echo $i; ?>" id="inlineCheckbox12" value="1">
                        </td>
                        <?php } ?>
                    </tr>
                    

                    <?php
                }
            } 
            while($perm=mysqli_fetch_array($consulta_a_log)){
                if($perm['user'] == $linha['id']){
                    ?>
                    <tr>
                        <td>
                            <label for="" class="form-label">LOG</label>
                        </td>
                        <?php

                            for($i=1;$i<=4;$i++){
                                if($perm['consultar'] == 1 && $i==4){
                                    $check = "checked";
                                }
                                else{
                                    $check = "";
                                }
                                $disable = "disabled";
                                if($i==4){
                                    $disable="";
                                }
                            ?>
                        <td>
                            <input class="form-check-input" <?php echo $check; echo $disable;?> type="checkbox" name="log<?php echo $i; ?>"
                                id="inlineCheckbox1" value="1">
                        </td>
                        <?php
                        }

                        ?>
                    </tr>
                    <?php
                }
            }
        ?>

                </tbody>
            </table>
        </div>
        <div class="col-md-4 container border rounded text-center">
            <label for="" class="form-label">
                <h5>Manutenção</h5>
            </label>
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th>Modulos</th>
                        <th>Criar</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                        <th>Consultar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            while($perm=mysqli_fetch_array($consulta_m_chamado)){
                if($perm['user'] == $linha['id']){
                    ?>
                    <tr>
                        <td>
                            <label for="" class="form-label">Chamado</label>
                        </td>
                        <?php

                            for($i=1;$i<=4;$i++){
                                if($perm['criar'] == 1 && $i==1){
                                    $check = "checked";
                                }
                                else if($perm['alterar'] == 1 && $i==2){
                                    $check = "checked";
                                }
                                else if($perm['excluir'] == 1 && $i==3){
                                    $check = "checked";
                                }
                                else if($perm['consultar'] == 1 && $i==4){
                                    $check = "checked";
                                }
                                else{
                                    $check = "";
                                }
                            ?>
                        <td>
                            <input class="form-check-input" <?php echo $check; ?> type="checkbox" name="ch<?php echo $i; ?>"
                                id="inlineCheckbox1" value="1">
                        </td>
                        <?php
                        }

                        ?>
                    </tr>
                    <?php
                }
            }
            while($perm=mysqli_fetch_array($consulta_m_equipamento)){
                if($perm['user'] == $linha['id']){
                    ?>
                    <tr>
                        <td>
                            <label for="" class="form-label">Equipamentos</label>
                        </td>
                        <?php

                            for($i=1;$i<=4;$i++){
                                if($perm['criar'] == 1 && $i==1){
                                    $check = "checked";
                                }
                                else if($perm['alterar'] == 1 && $i==2){
                                    $check = "checked";
                                }
                                else if($perm['excluir'] == 1 && $i==3){
                                    $check = "checked";
                                }
                                else if($perm['consultar'] == 1 && $i==4){
                                    $check = "checked";
                                }
                                else{
                                    $check = "";
                                }
                            ?>
                        <td>
                            <input class="form-check-input" type="checkbox" <?php echo $check;?> name="eq<?php echo $i; ?>"
                                id="inlineCheckbox1" value="1">
                        </td>
                        <?php
                        }

                        ?>
                    </tr>
                    <?php
                }
            }
            while($perm=mysqli_fetch_array($consulta_m_categoria)){
                if($perm['user'] == $linha['id']){
                    ?>
                    <tr>
                        <td>
                            <label for="" class="form-label">Categorias</label>
                        </td>
                        <?php

                            for($i=1;$i<=4;$i++){
                                if($perm['criar'] == 1 && $i==1){
                                    $check = "checked";
                                }
                                else if($perm['alterar'] == 1 && $i==2){
                                    $check = "checked";
                                }
                                else if($perm['excluir'] == 1 && $i==3){
                                    $check = "checked";
                                }
                                else if($perm['consultar'] == 1 && $i==4){
                                    $check = "checked";
                                }
                                else{
                                    $check = "";
                                }
                            ?>
                        <td>
                            <input class="form-check-input" type="checkbox" <?php echo $check;?> name="ca<?php echo $i; ?>"
                                id="inlineCheckbox1" value="1">
                        </td>
                        <?php
                        }

                        ?>
                    </tr>
                    <?php
                }
            }
            while($perm=mysqli_fetch_array($consulta_m_filial)){
                if($perm['user'] == $linha['id']){
                    ?>
                    <tr>
                        <td>
                            <label for="" class="form-label">Filial</label>
                        </td>
                        <?php

                            for($i=1;$i<=4;$i++){
                                if($perm['criar'] == 1 && $i==1){
                                    $check = "checked";
                                }
                                else if($perm['alterar'] == 1 && $i==2){
                                    $check = "checked";
                                }
                                else if($perm['excluir'] == 1 && $i==3){
                                    $check = "checked";
                                }
                                else if($perm['consultar'] == 1 && $i==4){
                                    $check = "checked";
                                }
                                else{
                                    $check = "";
                                }
                            ?>
                        <td>
                            <input class="form-check-input" type="checkbox" <?php echo $check; ?> name="fi<?php echo $i; ?>"
                                id="inlineCheckbox1" value="1">
                        </td>
                        <?php
                        }

                        ?>
                    </tr>
                    <?php
                }
            }
            while($perm=mysqli_fetch_array($consulta_m_local)){
                if($perm['user'] == $linha['id']){
                    ?>
                    <tr>
                        <td>
                            <label for="" class="form-label">Local</label>
                        </td>
                        <?php

                            for($i=1;$i<=4;$i++){
                                if($perm['criar'] == 1 && $i==1){
                                    $check = "checked";
                                }
                                else if($perm['alterar'] == 1 && $i==2){
                                    $check = "checked";
                                }
                                else if($perm['excluir'] == 1 && $i==3){
                                    $check = "checked";
                                }
                                else if($perm['consultar'] == 1 && $i==4){
                                    $check = "checked";
                                }
                                else{
                                    $check = "";
                                }
                                
                            ?>
                        <td>
                            <input class="form-check-input" type="checkbox" <?php echo $check; ?> name="lo<?php echo $i; ?>" id="inlineCheckbox1" value="1">
                        </td>
                        <?php
                        }

                        ?>
                    </tr>
                    <?php
                }
            }
            while($perm=mysqli_fetch_array($consulta_m_gchamado)){
                if($perm['user'] == $linha['id']){
                    ?>
                    <tr>
                        <td>
                            <label for="" class="form-label">Gerenciamento Chamados</label>
                        </td>
                        <?php

                            for($i=1;$i<=4;$i++){
                                if($perm['criar'] == 1 && $i==1){
                                    $check = "checked";
                                }
                                else if($perm['alterar'] == 1 && $i==2){
                                    $check = "checked";
                                }
                                else if($perm['excluir'] == 1 && $i==3){
                                    $check = "checked";
                                }
                                else if($perm['consultar'] == 1 && $i==4){
                                    $check = "checked";
                                }
                                else{
                                    $check = "";
                                }
                            ?>
                        <td>
                            <input class="form-check-input" type="checkbox" <?php echo $check; ?> name="gc<?php echo $i; ?>"
                                id="inlineCheckbox1" value="1">
                        </td>
                        <?php
                        }

                        ?>
                    </tr>
                    <?php
                }
            }
            while($perm=mysqli_fetch_array($consulta_m_gmanutencao)){
                if($perm['user'] == $linha['id']){
                    ?>
                    <tr>
                        <td>
                            <label for="" class="form-label">Gerenciamento Manutenções</label>
                        </td>
                        <?php

                            for($i=1;$i<=4;$i++){
                                    if($perm['criar'] == 1 && $i==1){
                                        $check = "checked";
                                    }
                                    else if($perm['alterar'] == 1 && $i==2){
                                        $check = "checked";
                                    }
                                    else if($perm['excluir'] == 1 && $i==3){
                                        $check = "checked";
                                    }
                                    else if($perm['consultar'] == 1 && $i==4){
                                        $check = "checked";
                                    }
                                    else{
                                        $check = "";
                                    }
                            ?>
                        <td>
                            <input class="form-check-input" type="checkbox" <?php echo $check; ?> name="gm<?php echo $i; ?>"
                                id="inlineCheckbox1" value="1">
                        </td>
                        <?php
                        }

                        ?>
                    </tr>
                    <?php
                }
            }
        ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success"><i class="far fa-check-circle fa-2x"></i></button>
        </div>
    </form>
    <br>

    <?php   }
        }
    ?>
</div>
<?php
    include('./Administracao/Usuarios/footer_page.php');
?>
</body>

</html>