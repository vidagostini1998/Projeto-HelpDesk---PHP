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
        include('./HelpDesk/header/header1.php');
        include('./db.php');
        ?>

<div class="container-fluid">



    <?php
        while($linha=mysqli_fetch_array($consulta_alter_chamados)){ 
        if($linha['id']==$_GET['id']){
        ?>



    <form class="row g-3">
        <div class="col-md-1">
            <label for="id" class="form-label">ID</label>
            <input type="text" name="id_chamado" class="form-control text-center" id="id_chamado" readonly
                value="<?php echo $linha['id'] ?>" disabled>

        </div>
        <div class="col-md-2">
            <label for="data_ab" class="form-label">Data Abertura</label>
            <input type="date" name="data_ab" class="form-control text-center" id="data_ab" readonly
                value="<?php echo $linha['data_chamado'] ?>">
        </div>

        <div class="col-md-2">
            <label for="data_conclu" class="form-label">Data de Conclusão</label>
            <input type="date" class="form-control text-center" id="data_conclu"
                value="<?php echo $linha['data_conclusão'] ?>" disabled>
        </div>

        <div class="col-md-2">
            <label for="solicitante" class="form-label">ID Solicitante</label>
            <input type="text" name="solicitante" class="form-control text-center" id="solicitante" readonly
                value="<?php echo $linha['solicitante'] ?>" disabled>

        </div>
        <div class="col-md-2">
            <label for="soli" class="form-label"> Solicitante </label>
            <input type="text" id="soli" class="form-control text-center" value="<?php echo $linha['nome'] ?>" disabled>
        </div>

        <div class="col-md-6">
            <label for="problema" class="form-label">Problema</label>
            <textarea name="problema" required class="form-control" id="problema"
                disabled><?php echo $linha['problema'] ?></textarea>
        </div>

        <div class="col-md-6">
            <label for="inputAddress2" class="form-label">Solução</label>
            <textarea disabled class="form-control" id="solucao"
                placeholder="Solução"> <?php echo $linha['solucao'] ?> </textarea>
        </div>

        <div class="col-md-6">
            <label for="obs" class="form-label">OBS</label>
            <textarea disabled name="obs" class="form-control" id="obs"
                placeholder="OBS"><?php echo $linha['obs'] ?></textarea>
        </div>
        <div class="col-md-6 ">
            <label class="form-label">Atualizações</label>
            <div class="table-overflow">
                <table class="table border">
                    <tbody>
                    <?php
                            
                            while($linha4 = mysqli_fetch_array($consulta_atualiza_equip)){                               
                                echo '<tr><td>'.$linha4['data'].'</td>';
                                echo '<td>'.$linha4['descricao'].'</td>';
                                echo '<td>'.$linha4['nome'].'</td>';
                              }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-2">

            <label for="patrimonio" class="form-label">Patrimonio</label>
            <select required id="patrimonio" disabled name="patrimonio" class="form-select"
                onchange="showCustomer(this.value)">

                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_patrimonio)){
                        if($linha['patrimonio'] == $linha1['id_patrimonio']){
                            $select = "selected";
                        echo '<option value="'.$linha1['id_patrimonio'].'" '.$select.'>'.$linha1['patrimonio'].'</option>';
                        }
                        else{
                            $select = "";
                            echo '<option value="'.$linha1['id_patrimonio'].'" '.$select.'>'.$linha1['patrimonio'].'</option>';
                        }
                    }
                  ?>

            </select>
        </div>
        <div class="col-md-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select required disabled id="categoria" name="categoria" class="form-select">
                <option>Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_categoria)){
                        if($linha['categoria'] == $linha1['id_cate']){
                            $select = "selected";
                            echo '<option value="'.$linha1['id_cate'].'"'.$select.' >'.$linha1['nome_cate'].'</option>';
                        }
                        else{
                            $select = "";
                            echo '<option value="'.$linha1['id_cate'].'"'.$select.' >'.$linha1['nome_cate'].'</option>';
                        }
                    }
                  ?>
            </select>
        </div>
        
        <div class="col-md-3">
            <label for="local" class="form-label">Local</label>
            <select required id="local" disabled name="local" class="form-select">
                <option selected>Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_local)){
                        if($linha['local'] == $linha1['id_local']){
                            $select = "selected";
                            echo '<option value="'.$linha1['id_local'].'" '.$select.'>'.$linha1['nome_local'].'</option>';
                        }
                        else{
                            $select = "";
                            echo '<option value="'.$linha1['id_local'].'" '.$select.'>'.$linha1['nome_local'].'</option>';
                        }
                    }
                  ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="filial" class="form-label">Filial</label>
            <select required id="filial" disabled name="filial" class="form-select">
                <option selected>Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_filial)){
                        if($linha['filial'] == $linha1['id_filial']){
                            $select = "selected";
                            echo '<option value="'.$linha1['id_filial'].'" '.$select.'>'.$linha1['nome_filial'].'</option>';
                        }
                        else{
                            $select = "";
                            echo '<option value="'.$linha1['id_filial'].'" '.$select.'>'.$linha1['nome_filial'].'</option>';
                        }
                    }
                  ?>
            </select>
        </div>
        <div id="txt"></div>
        <div class="col-12">
            <a class="btn btn-secondary" href="?page=alterar_chpatrimonio&id=<?php echo $linha['id']; ?>"><i class="far fa-edit fa-2x"></i></a>
                <a class="btn btn-info" href="?page=atualiza_equip&id=<?php echo $linha['id'];?>"><i class="far fa-comment fa-2x"></i></a>
            <a class="btn btn-success" href="?page=resolver_chequip&id=<?php echo $linha['id'];?>"><i class="far fa-check-circle fa-2x"></i></a>
            
        </div>
    </form>
    <?php   }
        }
    ?>
</div>
<?php
    include('./HelpDesk/alter/footer.php');
    ?>
</body>

</html>